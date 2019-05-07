import Vue from 'vue';
import Vuex from 'vuex';
import Lodash from 'lodash';
import Axios from 'axios';

const _ = Lodash;
const axios = Axios;

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        user: {
            preview: '/images/default.png',
            permissions: [],
        },
        company: {
            preview: 'https://via.placeholder.com/250x250.png?text=Logo',
            users: [],
            owner: null
        },
        place: {
            geometry: {
                location:
                    {
                        lat: 55.755826,
                        lng: 37.617299900000035
                    },
                viewport: new google.maps.LatLngBounds(
                    new google.maps.LatLng(55.142591, 36.80322490000003),
                    new google.maps.LatLng(56.0214609, 37.967822100000035),
                )
            }
        },
        markers: [],
        reception: {
            services: []
        },
        roles: [],
        users: [],
        filteredUsers: [],
        services: [],
        permissions: []
    },
    getters: {
        user(state) {
            return state.user;
        },
        company(state) {
            return state.company
        },
        reception(state) {
            return state.reception
        },
        services(state) {
            return state.services
        },
        users(state) {
            return _.difference(state.users, state.reception.users);
        },
        place(state) {
            return state.place
        },
        markers(state) {
            return state.marker
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
                preview: '/images/default.png',
            };
        },
        setCompany(state, payload) {
            state.company = payload
        },
        clearCompany(state) {
            state.company = {
                preview: '/images/metal.png',
            }
        },
        setReception(state, payload) {
            state.reception = payload
        },
        setServices(state, payload) {
            state.services = payload
        },
        setUsers(state, payload) {
            state.users = payload
        },
        setOwners(state, payload) {
            state.users = payload
        },
        setRoles(state, payload) {
            state.roles = payload;
        },
        setPermissions(state, payload) {
            state.permissions = payload;
        },
        setPlace(state, payload) {
            state.place = payload
        },
    },
    actions: {
        setUser({commit}, payload) {
            commit('setUser', payload);
        },
        getReception({commit}, payload) {
            axios.get('/api/receptions/' + payload).then(response => {
                commit('setReception', response.data);
            })
        },
        getServices({commit}) {
            axios.get('/api/services ').then(response => {
                commit('setServices', response.data)
            })
        },
        getEmployees({commit}) {
            axios.get('/api/employees').then(response => {
                commit('setUsers', response.data)
            })
        },
        async getOwners({commit}, payload) {
            let owners = await axios.get('/api/owners');
            commit('setOwners', owners.data)
        },
        getCompany({commit}, payload) {
            axios.get('/api/companies/' + payload)
                .then(response => {
                    commit('setCompany', response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getRoles({commit}) {
            axios.get('/api/roles')
                .then(response => {
                    commit('setRoles', response.data)
                });
        },
        getPermissions({commit}, payload) {
            axios.get('/api/permissions')
                .then(response => {
                    commit('setPermissions', response.data)
                })
                .catch(error => {
                });
        },
        getUser({commit}, payload) {
            axios.get('/users/' + payload + '/edit')
                .then(response => {
                    commit('setUser', response.data);
                });
        },
        geocodePlace({commit}, payload) {
            new google.maps.Geocoder().geocode(
                {
                    // placeId: payload.place_id,
                    location: payload.geometry.location
                },
                function (result, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        commit('setPlace', result[0]);
                    }
                }
            );
        },
        getPlace({commit}, payload) {
            axios.get('/api/places/' + payload)
                .then(response => {
                    new google.maps.Geocoder().geocode(
                        {
                            placeId: response.data.place_id,
                            // location: {
                            //     lat: parseFloat(response.data.geometry.location.lat),
                            //     lng: parseFloat(response.data.geometry.location.lng),
                            // }
                        },
                        function (result, status) {
                            if (status === google.maps.GeocoderStatus.OK) {
                                commit('setPlace', result[0]);
                            }
                        }
                    );
                })
        },
        authUser({commit}) {
            axios.get('/profile')
                .then(response => {
                    commit('setUser', response.data)
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
        },
        updateCompany({commit}, payload) {
            axios.post('/companies/', payload.data)
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
