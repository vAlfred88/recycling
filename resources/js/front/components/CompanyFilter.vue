<template>
    <div>
        <span class="column-title vT" @click="toggle"><span class="inb bT filter-btn"></span>Все ломозаготовители России, участвующие в рейтинге</span>
        <transition name="filter">
            <div v-show="is_shown">
                <div class="filret clearfix shadow-element">
                    <div class="filret__select-box">
                        <div class="nice-select region opens">
                            <span class="current" @click="isShown = true">{{ city }}</span>
                            <ul class="list" v-show="isShown">
                                <li class="option"
                                    v-for="item in cities"
                                    @click="onCitySelect(item)"
                                    :key="item">{{ item }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="filret__checkbox-box">
                        <label class="checkbox-btn" v-for="service in services" :key="service.id">
                            <input type="checkbox" :value="service.id" @change="onChange(service)">
                            <span>{{ service.name }}</span>
                        </label>
                        <div class="search-box clearfix rL">
                            <input type="button" class="search-btn" value="Поиск">
                            <div class="rL hid">
                                <input type="text" name="search" class="search-fild">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
<script>
    import { mapGetters } from 'vuex';

    export default {
        name: 'CompanyFilter',
        data() {
            return {
                is_shown: false,
                isShown: false,
                selectedServices: [],
                selectedCity: this.city,
            }
        },
        computed: {
            ...mapGetters({
                services: 'services',
                cities: 'cities',
            }),
            city: {
                get() {
                    return this.$store.getters.city;
                },
                set(value) {
                    this.$store.commit('setCity', value);
                }
            }
        },
        async created() {
            await this.$store.dispatch('loadServices');
        },
        methods: {
            toggle() {
                this.is_shown = !this.is_shown
            },
            async onCitySelect(city) {
                this.$store.commit('setCity', city);
                this.isShown = false;
                await this.$store.dispatch('filterCompanies', {
                    city: city
                });
            },
            async onChange(service) {
                if (this.selectedServices.indexOf(service.name) === -1) {
                    this.selectedServices.push(service.name);
                } else {
                    this.selectedServices.splice(this.selectedServices.indexOf(service), 1);
                }

                if (!!this.selectedServices.length) {
                    await this.$store.dispatch('filterCompanies', {
                        services: this.selectedServices
                    });
                } else {
                    await this.$store.dispatch('loadCompanies');
                }
            }
        }
    }
</script>

<style>
    .filter-enter-active, .filter-leave-active {
        transition: all .5s ease;
    }

    .filter-enter, .filter-leave-to {
        transform: translateY(-100px);
        opacity: 0;
    }

    .column-title {
        cursor: pointer;
    }
</style>
