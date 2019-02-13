<template>
    <section>
        <gmap-map :center="{lat: parseFloat(receptions[0].lat), lng: parseFloat(receptions[0].lng)}"
                  :zoom="10"
                  class="overflow-hidden rounded"
                  map-type-id="terrain"
                  ref="map"
                  style="height: 480px"
                  v-if="!!receptions">
            <gmap-cluster>
                <gmap-marker :clickable="true"
                             :draggable="true"
                             :key="reception.id"
                             :position="{lat: parseFloat(reception.lat), lng: parseFloat(reception.lng)}"
                             class="mx-15 overflow-hidden"
                             v-for="reception in receptions">
                </gmap-marker>
            </gmap-cluster>
        </gmap-map>
    </section>
</template>

<script>
    export default {
        name: "Map",
        data() {
            return {
                receptions: null
            }
        },
        created() {
            axios.get('/api/receptions')
                .then(response => {
                    this.receptions = response.data
                })
        },
        watch: {
            receptions() {
                if (!!this.receptions) {
                    this.receptions.forEach(reception => {
                        this.$refs.map.extend({lat: reception.lat, lng: reception.lng})
                    })
                }
            }
        }
    }
</script>

<style scoped>

</style>