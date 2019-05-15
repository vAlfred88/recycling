<template>
    <div class="metall-trend-wrap">
        <div class="metall-trend-item shadow-element clearfix">
            <div class="metall-trend-item__header clearfix">
                <span class="metall-trend-item__price db fright">8,26 $</span>
                <span class="metall-trend-item__title db">Алюминий</span>
            </div>
            <div class="index fright growth">7483</div>
            <div class="schedule">
                <line-chart :width="210" :height="50" :chart-data="aluminium" :options="options"></line-chart>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Aluminium",
        data() {
            return {

            }
        },
        async created() {
            await this.$store.dispatch('loadMetals', 'Aluminium');
        },
        computed: {
            aluminium() {
                return this.$store.getters.metals
            },

            options() {
                return this.$store.getters.chartOptions
            }
        },
    }
</script>

<style scoped>

</style>
