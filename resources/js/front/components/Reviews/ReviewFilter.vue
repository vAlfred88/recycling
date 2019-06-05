<template>
    <div class="tbc left-cell">
        <div class="select-box">
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
        <label class="checkbox-btn db all-reviews">
            <input type="checkbox">
            <span>Все отзывы</span>
        </label>
        <span class="cuption db">Офис</span>
        <label class="checkbox-btn db office">
            <input type="checkbox">
            <span>{{ company.address }}</span>
        </label>

        <span class="cuption db">Пункты приема</span>
        <label class="checkbox-btn db reception-point" v-for="reception in receptions">
            <input type="checkbox" :value="reception.id">
            <span>{{ reception.address }}</span>
        </label>
    </div>
</template>

<script>
    export default {
        name: "ReviewFilter",
        props: {
            company: {
                required: true,
                type: Object,
            }
        },
        data() {
            return {
                isShown: false
            }
        },
        computed: {
            cities() {
                return this.$store.getters.cities;
            },
            receptions() {
                return this.$store.getters.receptions;
            },
            city() {
                return this.$store.getters.city;
            }
        },
        async created() {
            await this.$store.dispatch('loadCities');
            await this.$store.dispatch('loadReceptions');
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
