<template>
    <div class="city">
        <select id="city" v-model="city" class="city">
            <option :value="item" v-for="item in cities" :key="item">{{ item }}</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "CitySelect",
        async created() {
            $('.city').niceSelect();
        },
        computed: {
            cities() {
                return this.$store.getters.cities
            },
            city() {
                return this.$store.getters.city
            }
        },
    }
</script>

<style scoped>

</style>
