<template>

</template>

<script>
    import { gmapApi } from 'vue2-google-maps'

    export default {
        name: "ReceptionsTab",
        data() {
            return {
                isListing: false,
                center: {
                    lat: 55.751244,
                    lng: 37.618423
                }
            }
        },
        props: {
            receptions: {
                required: true,
                type: Array,
            }
        },
        computed: {
            google: gmapApi
        },
        mounted() {
            this.$gmapApiPromiseLazy()
                .then(() => {
                    let bound = new google.maps.LatLngBounds();
                    this.receptions.map(reception => {
                        bound.extend(
                            new google.maps.LatLng(
                                parseFloat(reception.place.lat),
                                parseFloat(reception.place.lng)
                            )
                        );
                    });
                    this.updateCenter(bound.getCenter());
                    this.$refs.map.fitBounds(bound);
                });
        },
        methods: {
            updateCenter(center) {
                this.center = center;
            }
        }
    }
</script>

<style scoped>

</style>
