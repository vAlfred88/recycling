window._ = require('lodash');
window.Vue = require('vue');
window.axios = require('axios');
window.moment = require('moment');

import vModal from 'vue-js-modal';
Vue.use(vModal);

import VueSlick from 'vue-slick';

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

import store from './store'

moment.locale('ru');

import VeeValidate, {Validator} from 'vee-validate';
Validator.localize('ru', require('vee-validate/dist/locale/ru'));
Vue.use(VeeValidate, {
    locale: 'ru'
});

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

import LineChart from './LineChart.js'

Vue.component('line-chart', LineChart);
Vue.component('al-chart', require('./components/Charts/MetalCost'));
Vue.component('company-filter', require('./components/CompanyFilter'));
Vue.component('company-list', require('./components/CompanyList'));
Vue.component('city-select', require('./components/CitySelect'));
Vue.component('review-create', require('./components/Reviews/Create'));
Vue.component('review-list', require('./components/Reviews/Index'));
Vue.component('login-modal', require('./components/Modals/Login'));
Vue.component('info-modal', require('./components/Modals/InfoModal'));
Vue.component('metals-list', require('./components/MetalsList'));
Vue.component('metals-item', require('./components/MetalsListItem'));
Vue.component('reception-filter', require('./components/ReceptionFilter'));
Vue.component('review-filter', require('./components/Reviews/ReviewFilter'));
Vue.component('slick', VueSlick);
Vue.component('users-slick', require('./components/UserSlick'));
Vue.component('receptions-tab', require('./components/ReceptionsTab'));

window.events = new Vue();

window.flash = function (message, level = 'success') {
    window.events.$emit('flash', {message, level});
};

const app = new Vue({
    el: '#main',
    store
});
