<template>
    <div class="w-100">
        <form @submit.prevent="submit" method="post" role="form" class="php-email-form border-radius-5">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" v-model="first_name" class="form-control" id="first_name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" v-model="last_name" class="form-control" id="last_name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" v-model="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" v-model="message" id="message" rows="10" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-standard" :disabled="disableSubmit">Send Message <i v-show="disableSubmit" class="fas fa-spinner fa-pulse ms-2"></i></button>
            </div>
        </form>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    data () {
        return {
            first_name: '',
            last_name: '',
            email: '',
            message: '',
            disableSubmit: false,
        }
    },
    methods: {
        submit() {
            this.disableSubmit = true;

            if(this.first_name != '' && this.last_name != '' && this.email != '' && this.message != '') {
                var formData = new FormData();
                formData.append('first_name', this.first_name);
                formData.append('last_name', this.last_name);
                formData.append('email', this.email);
                formData.append('message', this.message);

                this.$axios
                    .post('/contactus', formData)
                    .then(response => {
                        this.disableSubmit = false;
                        this.first_name = '';
                        this.last_name = '';
                        this.email = '';
                        this.message = '';
                        toast.success(response.data.message);
                    })
                    .catch(error => {
                        toast.error(error.response.data.message);
                        this.disableSubmit = false;
                    });
            } else {
                toast.error('Please fill all the fields correctly.');
                this.disableSubmit = false;
            }
        }
    }
}
</script>
