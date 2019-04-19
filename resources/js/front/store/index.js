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
        companies: [],
        companyPaginate: null
    },
    getters: {
        services(state) {
            return state.services
        },
        companies(state) {
            return state.companies
        },
        companyPaginate(state) {
            return state.companyPaginate
        }
    },
    mutations: {
        setServices(state, payload) {
            state.services = payload
        },
        setCompanies(state, payload) {
            state.companies = payload
        },
        setCompanyPaginate(state, payload){
            state.companyPaginate = payload
        },
        pushCompanies(state, payload) {
            console.log(payload)
            _.each(payload, value => {
                state.companies.push(value);
            })
        }
    },
    actions: {
        async loadServices({commit}) {
            const services = await axios.get('api/services');
            commit('setServices', services.data);
        },
        async loadCompanies({commit}) {
            const companies = await axios.get('api/companies');
            commit('setCompanies', companies.data.data);
            commit('setCompanyPaginate', companies.data);
        },
        async pushCompanies({commit}, payload){
            const companies = await axios.get(payload);
            commit('pushCompanies', companies.data.data);
            commit('setCompanyPaginate', companies.data)

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
