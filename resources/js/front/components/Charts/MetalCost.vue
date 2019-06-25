<template>
    <div class="metall-trend-wrap">
        <div class="metall-trend-item shadow-element clearfix">
            <div class="metall-trend-item__header clearfix">
                <span class="metall-trend-item__price db fright">{{ chartData | lastCost }} $</span>
                <span class="metall-trend-item__title db"><slot></slot></span>
            </div>
            <div class="index fright" :class="getDirectionCost(chartData)">{{ chartData | growCost }} %</div>
            <div class="schedule">
                <line-chart :width="210" :height="50" :chart-data="chartData" :options="options"></line-chart>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MetalCostsChart",
        data() {
            return {
                data: {}
            }
        },
        props: {
            metal: {
                type: String,
                required: true
            }
        },
        async created() {
            await this.loadMetals();
        },
        methods: {
            async loadMetals() {
                const metals = await axios.get('/api/metals', {
                    params: {
                        metal: this.metal,
                    }
                });
                this.chartData = metals.data;
            },
            getDirectionCost(value) {
                let cost = this.$options.filters.growCost(value);

                if (Math.sign(cost) >= 0) {
                    return 'growth';
                }

                return 'falling';
            }
        },
        filters: {
            lastCost(value) {
                if (value.datasets) {
                    return _.last(_.first(value.datasets).data);
                }
            },
            growCost(value) {
                if (value.datasets) {
                    let previous = _.nth(_.first(value.datasets).data, -2);
                    let current = _.nth(_.first(value.datasets).data, -1);
                    let percent = (current - previous) / 100;

                    return percent.toFixed(2);
                }
            }
        },
        computed: {
            chartData: {
                get() {
                    return this.data
                },
                set(value) {
                    this.data = value
                }
            },
            options() {
                return this.$store.getters.chartOptions
            }
        },
    }
</script>

<style scoped>

</style>
