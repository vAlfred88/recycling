<template>
    <div class="city">
        <select id="city" v-model="city" @change="onCitySelect">
            <option :value="item" v-for="item in cities" :key="item">{{ item }}</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "CitySelect",
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
            async onCitySelect() {
                await this.$store.dispatch('filterCompanies', {
                    city: this.city
                });
            },
        }
    }
</script>

<style scoped>

</style>
