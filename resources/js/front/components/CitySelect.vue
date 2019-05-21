<template>
    <div class="city">
        <div class="nice-select region opens">
            <span class="current" @click="isShown = true">{{ city }}</span>
            <ul class="list" v-show="isShown">
                <li class="option selected focus"
                    v-for="item in cities"
                    @click="onCitySelect(item)"
                    :key="item">{{ item }}</li>
            </ul>
            <!--        <select id="city" v-model="city" @change="onCitySelect">-->
            <!--            <option :value="item" v-for="item in cities" :key="item">{{ item }}</option>-->
            <!--        </select>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "CitySelect",
        data() {
            return {
                isShown: false
            }
        },
        async created() {
            await this.$store.dispatch('loadCities');
        },
        computed: {
            cities() {
                return this.$store.getters.cities
            },
            city: {
                get() {
                    return this.$store.getters.city;
                },
                set(value) {
                    this.$store.commit('setCity', value);
                }
            }
        },
        methods: {
            async onCitySelect(city) {
                this.$store.commit('setCity', city);
                this.isShown = false;
                await this.$store.dispatch('filterCompanies', {
                    city: city
                });
            },
        }
    }
</script>

<style scoped>

</style>
