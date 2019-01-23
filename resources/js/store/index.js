import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        userImage: {
            dataUrl: '/images/default.png',
            blob: null
        },
        user: {
            name: '',
            email: '',
            phone: '',
            role: '',
            position: '',
            permissions: [],
            password: '',
        },
        roles: [],
        permissions: []
    },
    getters: {
        userImage(state) {
            return state.userImage;
        },
        user(state) {
            return state.user;
        },
        roles(state) {
            return state.roles;
        },
        permissions(state) {
            return state.permissions;
        },
    },
    mutations: {
        setUserImage(state, payload) {
            state.userImage = payload;
        },
        setUser(state, payload) {

        },
        setRoles(state, payload) {
            state.roles = payload;
        },
        setPermissions(state, payload) {
            state.permissions = payload;
        },
    },
    actions: {
        setUserImage({commit}, payload) {
            commit('setUserImage', payload);
        },
        setUser({commit}, payload) {
            commit('setUser', payload);
        },
        getRoles({commit}) {
            axios.get('/roles')
                .then(response => {
                    commit('setRoles', response.data)
                })
        },
        getPermissions({commit}) {
            axios.get('/permissions')
                .then(response => {
                    commit('setPermissions', response.data)
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
})