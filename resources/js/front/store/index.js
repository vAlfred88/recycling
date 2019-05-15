import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';
import lodash from 'lodash'

const axios = Axios;
const _ = lodash;

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        services: [],
        selectedServices: [],
        companies: [],
        companyPaginate: Object,
        reviews: [],
        cities: [],
        city: null,
        metals: {},
        chartOptions: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        display: false
                    }
                }]
            }
        }
    },
    getters: {
        services(state) {
            return state.services
        },
        selectedServices(state) {
            return state.selectedServices
        },
        companies(state) {
            return state.companies
        },
        companyPaginate(state) {
            return state.companyPaginate
        },
        reviews(state) {
            return state.reviews
        },
        cities(state) {
            return state.cities
        },
        city(state) {
            return state.city
        },
        metals(state) {
            return state.metals
        },
        chartOptions(state) {
            return state.chartOptions
        }
    },
    mutations: {
        setServices(state, payload) {
            state.services = payload
        },
        setSelectedServices(state, payload) {
            state.selectedServices = payload
        },
        setCompanies(state, payload) {
            state.companies = payload
        },
        setCompanyPaginate(state, payload) {
            state.companyPaginate = payload
        },
        pushCompanies(state, payload) {
            _.each(payload, value => {
                state.companies.push(value);
            })
        },
        setReviews(state, payload) {
            state.reviews = payload
        },
        pushReviews(state, payload) {
            state.reviews.push(payload);
        },
        setCities(state, payload) {
            state.cities = payload;
        },
        setCity(state, payload) {
            state.city = payload;
        },
        setMetals(state, payload) {
            state.metals = payload
        }
    },
    actions: {
        async loadServices({commit}) {
            const services = await axios.get('api/services');
            commit('setServices', services.data);
        },
        async loadCompanies({commit}) {
            const companies = await axios.get('api/companies');
            commit('setSelectedServices', []);
            commit('setCompanies', companies.data.data);
            commit('setCompanyPaginate', companies.data);
        },
        async pushCompanies({state, commit}, payload) {
            console.log(payload);
            let companies;
            if (!!state.selectedServices.length) {
                companies = await axios.get(payload, {
                    params: {
                        services: state.selectedServices
                    }
                });
            } else {
                companies = await axios.get(payload);
            }
            commit('pushCompanies', companies.data.data);
            commit('setCompanyPaginate', companies.data)
        },
        async filterCompanies({commit}, payload) {
            const companies = await axios.get('/api/companies/filter', {
                params: {
                    services: payload.services,
                    city: payload.city
                }
            });
            commit('setCity', payload.city);
            commit('setSelectedServices', payload.services);
            commit('setCompanies', companies.data.data);
            commit('setCompanyPaginate', companies.data);
        },
        async loadReviews({commit}, payload) {
            const reviews = await axios.get('/recycles/' + payload + '/reviews');
            commit('setReviews', reviews.data);
        },
        async loadCities({commit}) {
            const cities = await axios.get('/api/companies/cities');
            commit('setCities', cities.data);
            commit('setCity', 'Москва');
        },
        async loadMetals({commit}, payload) {
            const metals = await axios.get('/api/metals', {
                params: {
                    metal: payload,
                }
            });
            commit('setMetals', metals.data);
        }
    }
});
