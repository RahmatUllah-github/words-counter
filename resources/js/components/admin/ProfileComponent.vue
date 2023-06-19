<template>
    <div class="container p-5">
        <form @submit.prevent="submit" method="POST" enctype="multipart/form-data">
            <div class="m-4">
                <img :src="imageSrc" width="150" class="border" />
            </div>

            <div class="form-group mb-3 w-75">
                <label for="image" class="form-label">Select Image</label>
                <input type="file" @change="imageSelected" class="form-control" accept=".jpg, .png, .jpeg, .gif">
            </div>

            <div class="form-group mb-3 w-75">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control" v-model="name" placeholder="Name" required>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" v-model="email" placeholder="Email" required>
            </div>

            <div class="form-group mb-3 w-75">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" v-model="password" placeholder="Password">
            </div>

            <div class="form-group mb-3 w-75">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control" v-model="confirm_password" placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn btn-primary" :disabled="disableSubmit">Save <span v-show="disableSubmit">...</span></button>
        </form>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    props: ['user'],
    data() {
        return {
            authUser: JSON.parse(this.user),
            imageSrc: '/images/avatar.jpeg',
            image: '',
            name: '',
            email: '',
            password: '',
            confirm_password: '',
            disableSubmit: false,
        }
    },
    mounted() {
        if (this.authUser.image != null) {
            this.imageSrc = this.authUser.image;
        }
        this.name = this.authUser.name;
        this.email = this.authUser.email;
    },
    methods: {
        imageSelected(event) {
            this.image = event.target.files[0];
            this.imageSrc = URL.createObjectURL(this.image);
        },
        submit() {
            this.disableSubmit = true;
            if (this.name != '' && this.email != '') {
                if (this.password == this.confirm_password) {
                    var formData = new FormData();
                    formData.append('name', this.name);
                    formData.append('email', this.email);
                    formData.append('image', this.image);
                    formData.append('password', this.password);
                    formData.append('confirm_password', this.confirm_password);

                    this.$axios
                        .post('/admin/profile', formData)
                        .then(response => {
                            this.disableSubmit = false;
                            toast.success(response.data.message);
                        })
                        .catch(error => {
                            toast.error(error.response.data.message);
                            this.disableSubmit = false;
                        });
                } else{
                    toast.error('Password and Confirm password must be same.');
                    this.disableSubmit = false;
                }
            } else{
                toast.error('Please fill all the fields correctly.');
                this.disableSubmit = false;
            }
        }
    }
}
</script>
