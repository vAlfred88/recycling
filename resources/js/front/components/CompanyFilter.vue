<template>
    <div>
        <span class="column-title vT"><span class="inb bT filter-btn" @click="toggle"></span>Все ломозаготовители России, участвующие в рейтинге</span>
        <transition name="filter">
            <div v-show="is_shown">
                <div class="filret clearfix shadow-element">
                    <div class="filret__select-box">
                        <select class="region">
                            <option value="Saint-Petersburg">Москва</option>
                            <option value="Moscow">Санкт-Петербург</option>
                            <option value="Yekaterinburg">Екатеринбург</option>
                            <option value="Yekaterinburg">Петропавловск-Камчатский</option>
                            <option value="Krasnoyarsk">Красноярск</option>
                        </select>
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
    export default {
        name: 'CompanyFilter',
        data() {
            return {
                is_shown: false,
                selectedServices: []
            }
        },
        computed: {
            services() {
                return this.$store.getters.services
            }
        },
        created() {
            this.$store.dispatch('loadServices');
        },
        methods: {
            toggle() {
                this.is_shown = !this.is_shown
            },
            onChange(service) {
                this.selectedServices.push(service.name);
                this.$store.dispatch('filterCompanies', this.selectedServices)
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
</style>
