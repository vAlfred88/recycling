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
            avatar: '/images/default.png'
        },
        fileLoaded: false,
        roles: [],
        permissions: []
    },
    getters: {
        userImage(state) {
            if (state.user.avatar instanceof Blob) {
                return window.URL.createObjectURL(state.user.avatar);
            }

            return state.user.avatar;
        },
        fileLoaded(state){
            return state.fileLoaded
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
            state.user.avatar = payload;
            state.fileLoaded = true;
        },
        setFileLoaded(state, payload){
            state.fileLoaded = payload;
        },
        setUser(state, payload) {
            state.user = payload;
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
        clearUser({commit}) {
            commit('setUser', {
                name: '',
                email: '',
                phone: '',
                roles: [],
                position: '',
                permissions: [],
                password: '',
                avatar: '/images/default.png'
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
                    this.$store.dispatch('clearUser');
                    flash('Пользовательские данные изменены');
                })
                .catch(error => {
                    console.log(error);
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