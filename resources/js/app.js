import Lodash from 'lodash'
import Vue from 'vue';
import Vuex from 'vuex';
import VeeValidate, {Validator} from 'vee-validate';
import Axios from 'axios';
// import GoogleMaps from '@google/maps';
import Moment from 'moment';
import Cropper from 'cropperjs';
import vModal from 'vue-js-modal';
import * as VueGoogleMaps from 'vue2-google-maps';

import PrettyCheckbox from 'pretty-checkbox-vue'
import PrettyCheck from 'pretty-checkbox-vue/check';
import PrettyRadio from 'pretty-checkbox-vue/radio';
import messagesRu from 'vee-validate/dist/locale/ru';

import store from './store'
import RolesComponent from './components/RolesComponent';
import CropperComponent from './components/Cropper';
// import MapComponent from './components/GoogleMap';
import UserForm from './components/Users/Form';
import CreateUser from './components/Users/Create';
import EditUser from './components/Users/Edit';
import ImageUpload from './components/Modal/ImageUploader';
import Flash from './components/Flash';
import InfoModal from './components/Modal/InfoModal';
import CompanyForm from './components/Companies/Form';
import CreateCompany from './components/Companies/Create';
import EditCompany from './components/Companies/Edit';
import CreateReception from './components/Receptions/Create';
import EditReception from './components/Receptions/Edit';
import ReceptionForm from './components/Receptions/Form';
import ReceptionsMap from './components/Receptions/Map';
import UserProfile from './components/Users/Profile';
// import SearchBox from './components/SearchBox';

window._ = Lodash;
window.Vue = Vue;
window.Vuex = Vuex;
window.axios = Axios;
window.moment = Moment;

moment.locale('ru');

// const googleMaps = GoogleMaps.createClient({
//     key: 'AIzaSyAR6Qvj3wvqFJY2iNIg77FeoU-4WOA2seU'
//     //key: 'AIzaSyDUx6bW_wJHbM6WdKasa_2VX16mhsyhlvw' -- production api key
// });

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Cropper = Cropper;

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

Vue.use(Vuex);

Validator.localize('ru', messagesRu);
Vue.use(VeeValidate, {
    locale: 'ru'
});
Vue.use(PrettyCheckbox);
Vue.use(vModal);

Vue.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyAR6Qvj3wvqFJY2iNIg77FeoU-4WOA2seU',
            libraries: 'places',
            region: 'RU',
            language: 'ru',
        }
    }
);

Vue.component('gmap-cluster', VueGoogleMaps.Cluster);

Vue.component('p-check', PrettyCheck);
Vue.component('p-radio', PrettyRadio);

Vue.component('roles-component', RolesComponent);
Vue.component('cropper', CropperComponent);
Vue.component('user-form', UserForm);
Vue.component('create-user', CreateUser);
Vue.component('edit-user', EditUser);
Vue.component('image-upload-modal', ImageUpload);
Vue.component('flash', Flash);
Vue.component('info-modal', InfoModal);
Vue.component('company-form', CompanyForm);
Vue.component('create-company', CreateCompany);
Vue.component('edit-company', EditCompany);
Vue.component('reception-form', ReceptionForm);
Vue.component('create-reception', CreateReception);
Vue.component('edit-reception', EditReception);
Vue.component('user-profile', UserProfile);
Vue.component('receptions-map', ReceptionsMap);
// Vue.component('google-map', MapComponent);
// Vue.component('search-box', SearchBox);


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => {
//         Vue.component(key.split('/').pop().split('.')[0], files(key))
//     }
// );

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.events = new Vue();

window.flash = function (message, level = 'success') {
    window.events.$emit('flash', {message, level});
};

const app = new Vue({
    el: '#app',
    store,
});
