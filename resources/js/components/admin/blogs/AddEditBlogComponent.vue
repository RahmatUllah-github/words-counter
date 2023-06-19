<template>
    <div class="container p-5">
        <h2>{{ action }} Blog</h2>
        <form @submit.prevent="submitForm" enctype="multipart/form-data">

            <div class="m-4">
                <img :src="imageSrc" width="300" class="border" />
            </div>

            <div class="form-group mb-3 w-75">
                <label for="image" class="form-label">Select Blog Image</label>
                <input type="file" @change="imageSelected" class="form-control" accept=".jpg, .png, .jpeg, .gif" required>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="category" class="form-label">Select Category</label>
                <select id="category" class="form-control" v-model="category">
                    <option disabled value="" selected>Select Category</option>
                    <option v-for="category in allCategories" :value="category.id" :key="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="page_title" class="form-label">Page Title</label>
                <input type="text" id="page_title" class="form-control" v-model="page_title" placeholder="Page Title" required>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="meta_keywords" class="form-label">Meta Keywords <small>(Separated by comma)</small> </label>
                <input type="text" id="meta_keywords" class="form-control" v-model="meta_keywords" placeholder="HTML, CSS, JavaScript" required>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="meta_description" class="form-label">Meta Description</label>
                <textarea id="meta_description" class="form-control" v-model="meta_description" placeholder="Meta Description" required></textarea>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" id="title" class="form-control" v-model="title" placeholder="Blog Title" required>
            </div>

            <div class="form-group mb-4 w-75">
                <label for="description" class="form-label">Blog Description</label>
                <QuillEditor theme="snow" v-model:content="description" contentType="html" id="description" class="form-control" required/>
            </div>

            <button type="submit" class="btn btn-primary" :disabled="disableSubmit">Publish <span v-show="disableSubmit">...</span></button>
        </form>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    props: ['categories', 'action', 'blog'],
    data() {
        return {
            allCategories: JSON.parse(this.categories),
            selectedBlog: this.blog ? JSON.parse(this.blog) : null,
            imageSrc: '/images/placeholder-image.jpg',
            category: '',
            image: '',
            title: '',
            page_title: '',
            meta_keywords: '',
            meta_description: '',
            description: '',
            disableSubmit: false,
        }
    },
    mounted() {
        if (this.action == 'Edit') {
            this.imageSrc = this.selectedBlog.image;
            this.category = this.selectedBlog.category_id;
            this.title = this.selectedBlog.title;
            this.page_title = this.selectedBlog.page_title;
            this.meta_keywords = this.selectedBlog.meta_keywords;
            this.meta_description = this.selectedBlog.meta_description;
            this.description = this.selectedBlog.description;
        }
    },
    methods: {
        imageSelected(event) {
            this.image = event.target.files[0];
            this.imageSrc = URL.createObjectURL(this.image);
        },
        submitForm() {
            this.disableSubmit = true;

            var url = '/admin/blogs/update';
            if (this.action == 'Add') {
                url = '/admin/blogs';

                if (!this.image || this.image == '' || this.image == null) {
                    toast.error('Please select the image.');
                }
            }

            if (this.category != '' && this.title != '' && this.description != '' && this.page_title != '' && this.meta_keywords != '' && this.meta_description != '') {
                var formData = new FormData();
                if (this.blog != '') {
                    formData.append('id', this.selectedBlog.id ?? '');
                }
                formData.append('category', this.category);
                formData.append('image', this.image);
                formData.append('title', this.title);
                formData.append('page_title', this.page_title);
                formData.append('meta_keywords', this.meta_keywords);
                formData.append('meta_description', this.meta_description);
                formData.append('description', this.description);

                this.$axios
                    .post(url, formData)
                    .then(response => {
                        this.disableSubmit = false;
                        toast.success(response.data.message);
                    })
                    .catch(error => {
                        toast.error(error.response.data.message);
                        this.disableSubmit = false;
                    });

            } else{
                toast.error('Please fill all the fields correctly.');
                this.disableSubmit = false;
            }
        }
    }
}
</script>
