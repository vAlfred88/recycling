import { Line, mixins } from 'vue-chartjs'

export default {
    extends: Line,
    mixins: [mixins.reactiveProp],
    data() {
        return {
            defaultOptions: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            display: false
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            display: false
                        }
                    }]
                }
            }
        }
    },
    props: {
        chartData: {
            type: Object,
            required:true,
            default: null
        },
        options: {
            type: Object,
            required:true,
            default: this.defaultOptions
        }
    },
    mounted() {
        this.renderChart(this.chartData, this.options)
    }
}
