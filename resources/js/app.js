require('./bootstrap');

import Vue from 'vue';
import Cropper from 'cropperjs';
import VeeValidate from 'vee-validate';
import PrettyCheckbox from 'pretty-checkbox-vue'

import RolesComponent from './components/RolesComponent';
import CropperComponent from './components/Cropper';
import UserForm from './components/Users/Form';
import PrettyCheck from 'pretty-checkbox-vue/check';

window.Vue = Vue;
window.Cropper = Cropper;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.use(VeeValidate);
Vue.use(PrettyCheckbox);

Vue.component('roles-component', RolesComponent);
Vue.component('cropper', CropperComponent);
Vue.component('user-form', UserForm);
Vue.component('p-check', PrettyCheck);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
