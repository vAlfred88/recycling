window._ = require('lodash');
window.Vue = require('vue');
window.axios = require('axios');
window.moment = require('moment');

import store from './store'

moment.locale('ru');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

Vue.component('company-filter', require('./components/CompanyFilter'));
Vue.component('company-list', require('./components/CompanyList'));

window.events = new Vue();

window.flash = function (message, level = 'success') {
    window.events.$emit('flash', {message, level});
};

const app = new Vue({
    el: '#main',
    store
});
