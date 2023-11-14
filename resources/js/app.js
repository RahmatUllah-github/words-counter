/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import axios from 'axios';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import CounterComponent from './components/CounterComponent.vue';
import ContactComponent from './components/ContactComponent.vue';
import ShareComponent from './components/ShareComponent.vue';
import CategoryComponent from './components/admin/CategoryComponent.vue';
import BlogComponent from './components/admin/blogs/BlogComponent.vue';
import ProfileComponent from './components/admin/ProfileComponent.vue';
import SiteSettingComponent from './components/admin/SiteSettingComponent.vue';
import AddEditBlogComponent from './components/admin/blogs/AddEditBlogComponent.vue';

app.component('counter-component', CounterComponent);
app.component('contact-component', ContactComponent);
app.component('share-component', ShareComponent);
app.component('category-component', CategoryComponent);
app.component('blog-component', BlogComponent);
app.component('profile-component', ProfileComponent);
app.component('site-setting-component', SiteSettingComponent);
app.component('add-edit-blog-component', AddEditBlogComponent);
app.component('QuillEditor', QuillEditor)

// Define your options
const globalOptions = {
    theme: 'snow',
    modules: {
        autoformat: true,
        syntax: true,
    },
  };

// Set default globalOptions prop
QuillEditor.props.globalOptions.default = () => globalOptions;

const axiosInstance = axios.create({
    headers: {
      common: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        accept: 'application/json',
      },
    },
});
app.config.globalProperties.$axios = axiosInstance;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
