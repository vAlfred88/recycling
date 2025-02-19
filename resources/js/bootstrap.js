// Lodash
import Axios from "axios";

window._ = require('lodash');

// Vue
import Vue from 'vue';
window.Vue = Vue;

// Vue flash
window.events = new Vue();
window.flash = function (message, level = 'success') {
    window.events.$emit('flash', {message, level});
};

// Vuex
import Vuex from 'vuex';
Vue.use(Vuex);

// VeeValidate
import VeeValidate, {Validator} from 'vee-validate';
Validator.localize('ru', require('vee-validate/dist/locale/ru'));
Vue.use(VeeValidate, {
    locale: 'ru'
});

// moment.js
import Moment from 'moment';
window.moment = Moment;
moment.locale('ru');

// Cropper.js
import Cropper from 'cropperjs'
window.Cropper = Cropper;

// GoogleMaps
import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyAR6Qvj3wvqFJY2iNIg77FeoU-4WOA2seU',
            libraries: 'places',
            region: 'RU',
            language: 'ru',
        }
    }
);
import GmapCluster from 'vue2-google-maps/dist/components/cluster'
Vue.component('gmap-cluster', GmapCluster);

// vModal
import vModal from 'vue-js-modal';
Vue.use(vModal);

// PrettyCheckbox
import PrettyCheckbox from 'pretty-checkbox-vue';
Vue.use(PrettyCheckbox);
Vue.component('p-check', require('pretty-checkbox-vue/check'));
Vue.component('p-radio', require('pretty-checkbox-vue/radio'));

// Prepare axios to work with laravel
window.axios = Axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
