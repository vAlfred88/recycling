<template>
    <tr>
        <td>
            <slot></slot>
        </td>
        <td>
            <span class="rate inb " :class="getDirectionCost(chartData)"><span class="price">{{ chartData | lastCost }} $</span><br><span
                class="percent">{{ chartData | growCost }} %</span>
            </span>
        </td>
    </tr>
</template>

<script>
    export default {
        name: "MetalsListItem",
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
                    // return (current - previous) / 100
                    return percent.toFixed(1)
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
