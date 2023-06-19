<template>
    <div class="container p-5">
        <form @submit.prevent="submit" method="POST" enctype="multipart/form-data">

            <div class="m-4">
                <label class="form-label me-3">Last Updated By: </label>
                <img :src="imageSrc" width="50" class="border rounded-circle me-2" />
                <span>{{ userName }}</span>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="home_page_title" class="form-label">Home Page Title</label>
                <input type="text" id="home_page_title" class="form-control" v-model="home_page_title" placeholder="Home Page Title" required>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="meta_keywords" class="form-label">Home Page Meta Keywords</label>
                <input type="text" id="meta_keywords" class="form-control" v-model="meta_keywords" placeholder="Home Page Meta Keywords" required>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="meta_description" class="form-label">Home Page Meta Description</label>
                <textarea id="meta_description" class="form-control" v-model="meta_description" placeholder="Home Page Meta Description" required></textarea>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="blogs_page_title" class="form-label">Blogs Page Title</label>
                <input type="text" id="blogs_page_title" class="form-control" v-model="blogs_page_title" placeholder="Blogs Page Title" required>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="blogs_page_meta_keywords" class="form-label">Blogs Page Meta Keywords</label>
                <input type="text" id="blogs_page_meta_keywords" class="form-control" v-model="blogs_page_meta_keywords" placeholder="Blogs Page Meta Keywords" required>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="blogs_page_meta_description" class="form-label">Blogs Page Meta Description</label>
                <textarea id="blogs_page_meta_description" class="form-control" v-model="blogs_page_meta_description" placeholder="Blogs Page Meta Description" required></textarea>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="blogs_per_page" class="form-label">Blogs Per Page</label>
                <input type="number" id="blogs_per_page" class="form-control" v-model="blogs_per_page" placeholder="Blogs Per Page" required>
            </div>

            <div class="form-group mb-4 w-75">
                <label for="page_text" class="form-label">Home Page Text</label>
                <QuillEditor theme="snow" v-model:content="page_text" contentType="html" id="page_text" class="form-control" required/>
            </div>

            <button type="submit" class="btn btn-primary" :disabled="disableSubmit">Save <span v-show="disableSubmit">...</span></button>
        </form>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    props: ['setting'],
    data() {
        return {
            siteSetting: this.setting ? JSON.parse(this.setting) : '',
            imageSrc: '/images/avatar.jpeg',
            userName: '',
            home_page_title: '',
            meta_keywords: '',
            meta_description: '',
            blogs_page_title: '',
            blogs_page_meta_keywords: '',
            blogs_page_meta_description: '',
            blogs_per_page: '',
            page_text: '',
            disableSubmit: false
        }
    },
    mounted() {
        if (this.siteSetting != '') {
            if (this.siteSetting.user.image != null) {
                this.imageSrc = this.siteSetting.user.image;
            }
            this.userName = this.siteSetting.user.name;
            this.home_page_title = this.siteSetting.home_page_title;
            this.meta_keywords = this.siteSetting.meta_keywords;
            this.meta_description = this.siteSetting.meta_description;
            this.blogs_page_title = this.siteSetting.blogs_page_title;
            this.blogs_page_meta_keywords = this.siteSetting.blogs_page_meta_keywords;
            this.blogs_page_meta_description = this.siteSetting.blogs_page_meta_description;
            this.blogs_per_page = this.siteSetting.blogs_per_page;
            this.page_text = this.siteSetting.page_text;
        }
    },
    methods: {
        submit() {
            this.disableSubmit = true;
            if (this.home_page_title != '' && this.meta_keywords != '' && this.meta_keywords != '' && this.meta_description != '' &&
                this.blogs_page_title != '' && this.blogs_page_meta_description != '' && this.blogs_page_meta_keywords != '' &&
                this.blogs_per_page != '' && this.page_text != ''
            ) {
                var formData = new FormData();
                formData.append('home_page_title', this.home_page_title);
                formData.append('meta_keywords', this.meta_keywords);
                formData.append('meta_keywords', this.meta_keywords);
                formData.append('meta_description', this.meta_description);
                formData.append('blogs_page_title', this.blogs_page_title);
                formData.append('blogs_page_meta_keywords', this.blogs_page_meta_keywords);
                formData.append('blogs_page_meta_description', this.blogs_page_meta_description);
                formData.append('blogs_per_page', this.blogs_per_page);
                formData.append('page_text', this.page_text);

                this.$axios
                    .post('/admin/site-settings', formData)
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
