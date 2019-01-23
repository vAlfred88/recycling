import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';

import Cropper from 'cropperjs';
import VeeValidate from 'vee-validate';
import PrettyCheckbox from 'pretty-checkbox-vue'
import vModal from 'vue-js-modal'
import PrettyCheck from 'pretty-checkbox-vue/check';
import PrettyRadio from 'pretty-checkbox-vue/radio';

import store from './store'
import RolesComponent from './components/RolesComponent';
import CropperComponent from './components/Cropper';
import UserForm from './components/Users/Form';
import ImageUpload from './components/Modal/ImageUploader';
import Flash from './components/Flash';



window.Vue = Vue;
window.Vuex = Vuex;
window.axios = Axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Cropper = Cropper;

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

Vue.use(Vuex);
Vue.use(VeeValidate);
Vue.use(PrettyCheckbox);
Vue.use(vModal);

Vue.component('p-check', PrettyCheck);
Vue.component('p-radio', PrettyRadio);

Vue.component('roles-component', RolesComponent);
Vue.component('cropper', CropperComponent);
Vue.component('user-form', UserForm);
Vue.component('image-upload-modal', ImageUpload);
Vue.component('flash', Flash);


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.events = new Vue();

window.flash = function (message, level = 'success') {
    window.events.$emit('flash', { message, level });
};

const app = new Vue({
    el: '#app',
    store
});
