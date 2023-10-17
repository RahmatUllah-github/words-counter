<template>
    <div class="d-flex" :class="divClass">
        <a :href="whatsapp" class="mx-1" target="_blank">
            <i class="fab fa-whatsapp-square fa-lg" style="color: #25d366; font-size: 40px;"></i>
        </a>
        <a :href="facebook" class="mx-1" target="_blank">
            <i class="fab fa-facebook-square fa-lg" style="color: #3b5998; font-size: 40px;"></i>
        </a>
        <a :href="twitter" class="mx-1" target="_blank">
            <i class="fab fa-twitter-square fa-lg" style="color: #00acee; font-size: 40px;"></i>
        </a>
        <a :href="linkedin" class="mx-1" target="_blank">
            <i class="fab fa-linkedin fa-lg" style="color: #0072b1; font-size: 40px;"></i>
        </a>
        <a role="button" @click="copy" class="mx-1">
            <i class="fas fa-copy" style="color: #b6b7b8; font-size: 33px;"></i>
        </a>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    props: {
        divClass: {
            type: String,
            required: true,
        },
        blogUrl: {
            type: String,
            required: true,
        }
    },
    computed: {
        whatsapp () {
            return 'whatsapp://send?text=' + encodeURIComponent(this.blogUrl);
        },
        facebook () {
            return 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(this.blogUrl);
        },
        twitter () {
            return 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(this.blogUrl);
        },
        linkedin () {
            return 'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(this.blogUrl);
        }
    },
    methods: {
        copy () {
            if (navigator.clipboard && this.blogUrl) {
                navigator.clipboard.writeText(this.blogUrl)
                    .then(function () {
                        toast.success('Link copied to clipboard');
                    })
                    .catch(function (error) {
                        toast.error('Failed to copy link');
                        console.error('Failed to copy link to clipboard:', error);
                    });
            }
        },
    }
}
</script>
