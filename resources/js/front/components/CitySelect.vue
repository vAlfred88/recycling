<template>
    <div class="city">
        <div class="nice-select region opens">
            <span class="current" @click="isShown = !isShown">{{ city }}</span>
            <ul class="list" v-show="isShown">
                <li class="option"
                    v-for="item in cities"
                    @click="onCitySelect(item)"
                    :key="item">{{ item }}
                </li>
            </ul>
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
            city() {
                return this.$store.getters.city;
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
