import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';

const axios = Axios;

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        services: [],
        companies: []
    },
    getters: {
        services(state) {
            return state.services
        },
        companies(state) {
            return state.companies
        }
    },
    mutations: {
        setServices(state, payload) {
            state.services = payload
        },
        setCompanies(state, payload) {
            state.companies = payload
        },
        pushCompanies(state, payload) {
            state.companies.push(payload)
        }
    },
    actions: {
        async loadServices({commit}) {
            const services = await axios.get('api/services');
            commit('setServices', services.data);
        },
        async loadCompanies({commit}) {
            const companies = await axios.get('api/companies');
            commit('setCompanies', companies.data);
        },
        async pushCompanies({commit}, payload){
            const companies = await axios.get('api/companies');
        },
        async filterCompanies({commit}, payload) {
            const companies = await axios.get('/api/companies/filter', {
                params: {
                    services: payload
                }
            });
            commit('setCompanies', companies.data)
        }
    }
});
