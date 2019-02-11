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
            location: '',
            place: null
        },
        place: {
            formatted_address: '',
            formatted_phone_number: '',
            name: '',
            place_id: '',
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
        markers: null,
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
                name: '',
                email: '',
                phone: '',
                roles: [],
                position: '',
                permissions: [],
                password: '',
                avatar: '',
                preview: '/images/default.png',
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
        setPlace(state, payload) {
            console.log(payload.geometry.location.toString());
            console.log(payload.geometry.viewport.toString());
            state.place = payload
        },
    },
    actions: {
        setUser({commit}, payload) {
            commit('setUser', payload);
        },
        getCompany({commit}, payload) {
            axios.get('/api/companies/' + payload)
                .then(response => {
                    commit('setCompany', response.data.data);
                })
                .catch(error => {
                    console.log(error);
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
                            placeId: response.data.data.place_id,
                            // location: {
                            //     lat: response.data.data.geometry.location.lat,
                            //     lng: response.data.data.geometry.location.lng,
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