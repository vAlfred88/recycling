require('./bootstrap');

import store from './store'

Vue.component('roles-component', require('./components/RolesComponent'));
Vue.component('cropper', require('./components/Cropper'));
Vue.component('user-form', require('./components/Users/Form'));
Vue.component('create-user', require('./components/Users/Create'));
Vue.component('edit-user', require('./components/Users/Edit'));
Vue.component('image-upload-modal', require('./components/Modal/ImageUploader'));
Vue.component('flash', require('./components/Flash'));
Vue.component('info-modal', require('./components/Modal/InfoModal'));
Vue.component('company-form', require('./components/Companies/Form'));
Vue.component('create-company', require('./components/Companies/Create'));
Vue.component('edit-company', require('./components/Companies/Edit'));
Vue.component('reception-form', require('./components/Receptions/Form'));
Vue.component('create-reception', require('./components/Receptions/Create'));
Vue.component('edit-reception', require('./components/Receptions/Edit'));
Vue.component('user-profile', require('./components/Users/Profile'));
Vue.component('receptions-map', require('./components/Receptions/Map'));

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => {
//         Vue.component(key.split('/').pop().split('.')[0], files(key))
//     }
// );

const app = new Vue({
    el: '#app',
    store,
});
