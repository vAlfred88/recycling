<template>
    <gmap-map :center="{lat:30, lng:30}"
              :zoom="10"
              class="overflow-hidden rounded"
              map-type-id="terrain"
              ref="map"
              style="height: 480px">
        <gmap-marker :clickable="true"
                     :draggable="true"
                     class="mx-15 overflow-hidden">
<!--                     :key="reception.id"-->
<!--                     :position="{lat: parseFloat(reception.place.lat), lng: parseFloat(reception.place.lng)}"-->
<!--                     v-for="reception in receptions">-->
        </gmap-marker>
    </gmap-map>
</template>

<script>
    export default {
        name: "Map",
        data() {
            return {
                receptions: []
            }
        },
        async created() {
            //todo получаем список пунктов, парсим и создаем точки для маркеров, добавляем маркеры на карту и увеличиваем зум
            const response = await axios.get('/api/receptions');
            this.receptions = response.data;
            // this.receptions.forEach(reception => {
            //     if (reception) {
            //         let new_bounds = this.$refs.map.getBounds().extend({
            //             lat: reception.place.lat,
            //             lng: reception.place.lng
            //         });
            //         this.$refs.map.fitBounds(new_bounds);
            //     }
            // })
        },
        methods: {
            getCenterMap() {
                return google.maps.LatLng({
                    lat: parseFloat(this.receptions[0].place.lat),
                    lng: parseFloat(this.receptions[0].place.lng),
                })
            },
        }
    }
</script>

<style scoped>

</style>
