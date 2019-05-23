<template>
    <div class="inner">
        <div class="ah1 alCenter">Пункты приема</div>
        <div class="filter_block">
            <div class="tab-control-box inb">
                <a class="inb cp vT switcher tab-control-item tab-control-item_active"></a>
                <a class="inb cp vT link2 tab-control-item"></a>
            </div>
            <a class="inb cp vT filter filter-btn" @click="toggleFilter"></a>
        </div>
        <div class="" v-show="isFilter">
            <div class="filret clearfix shadow-element">
                <div class="filret__select-box">
                    <div class="nice-select region opens">
                        <span class="current" @click="isCity = true">{{ city }}</span>
                        <ul class="list" v-show="isCity">
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
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: "ReceptionFilter",
        data() {
            return {
                isList: true,
                isMap: false,
                isFilter: false,
                isCity: false,
                selectedServices: [],
            }
        },
        async created() {
            await this.$store.dispatch('loadCities');
            await this.$store.dispatch('loadServices');
        },
        computed: {
            ...mapGetters({
                services: 'services',
                cities: 'cities',
                city: 'city'
            }),
        },
        methods: {
            toggleFilter() {
                this.isFilter = !this.isFilter;
            },
            async onCitySelect(city) {
                this.$store.commit('setCity', city);
                this.isCity = false;
                await this.$store.dispatch('filterReceptions', {
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
                    await this.$store.dispatch('filterReceptions', {
                        services: this.selectedServices,
                        city: this.city
                    });
                } else {
                    await this.$store.dispatch('loadCompanies');
                }
            }
        }
    }
</script>

<style scoped>

</style>
