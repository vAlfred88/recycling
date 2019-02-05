import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        user: {
            name: '',
            email: '',
            phone: '',
            roles: [],
            position: '',
            permissions: [],
            password: '',
            avatar: '',
            preview: '/images/default.png',
        },
        company: {
            name: '',
            description: '',
            phone: '',
            site: '',
            email: '',
            address: '',
            inn: '',
            kpp: '',
            ogrn: '',
            preview: '/images/metal.png',
            logo: '',
            viewport: '',
            location: ''
        },
        place: {
            location: '59.9376031, 30.389060200000017',
            viewport: '59.93619606970849, 30.38770886970849, 59.9388940302915, 30.390406830291568'
        },
        roles: [],
        permissions: []
    },
    getters: {
        user(state) {
            return state.user;
        },
        company(state) {
            return state.company
        },
        place(state) {
            return state.place
        },
        roles(state) {
            return state.roles;
        },
        permissions(state) {
            return state.permissions;
        },
    },
    mutations: {
        setUser(state, payload) {
            state.user = payload;
        },
        clearUser(state) {
            state.user = {
                name: '',
                email: '',
                phone: '',
                roles: [],
                position: '',
                permissions: [],
                password: '',
                avatar: '/images/default.png'
            };
        },
        setCompany(state, payload) {
            state.company = payload
        },
        clearCompany(state) {
            state.company = {
                name: '',
                description: '',
                phone: '',
                site: '',
                email: '',
                address: '',
                inn: '',
                kpp: '',
                ogrn: '',
                preview: '/images/metal.png',
                logo: null,
                viewport: '',
                location: ''
            }
        },
        setRoles(state, payload) {
            state.roles = payload;
        },
        setPermissions(state, payload) {
            state.permissions = payload;
        },
    },
    actions: {
        setUser({commit}, payload) {
            commit('setUser', payload);
        },
        getCompany({commit}, payload) {
            axios.get('/api/companies/' + payload)
                .then(response => {
                    commit('setCompany', response.data.data)
                });
        },
        getRoles({commit}) {
            axios.get('/api/roles')
                .then(response => {
                    commit('setRoles', response.data.data)
                });
        },
        getPermissions({commit}, payload) {
            axios.get('/api/permissions')
                .then(response => {
                    commit('setPermissions', response.data.data)
                })
                .catch(error => {
                });
        },
        getUser({commit}, payload) {
            axios.get('/users/' + payload + '/edit')
                .then(response => {
                    commit('setUser', response.data.data);
                });
        },
        authUser({commit}){
            axios.get('/profile')
                .then(response => {
                    commit('setUser', response.data.data)
                });
        },
        saveUser({commit}, payload) {
            axios.post(payload.url, payload.data)
                .then(response => {
                    commit('clearUser');
                    flash('Пользовательские данные изменены');
                })
                .catch(error => {
                    flash('Упс. что-то пошло не так ' + error);
                })
        },
        updateUser({commit}, payload) {
            axios.post(payload.url, payload.data)
                .then(response => {
                    console.log(response);
                    flash('Пользовательские данные изменены');
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
})