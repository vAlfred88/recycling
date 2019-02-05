<template>
    <div>
        <div class="mb-10">
            <input ref="autocomplete"
                   placeholder="Введите адрес или название объекта"
                   class="w-full border p-3 rounded"
                   name="address"
                   v-model="company.address"
                   id="address"
                   type="text">
        </div>
        <div ref="map"
             class="mx-15 map overflow-hidden">
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "GoogleMap",
        props: {
            location: {
                required: true,
            },
            viewport: {
                required: true
            },
            // address: {
            //     required: true
            // }
        },
        data() {
            return {
                map: null,
                autocomplete: null,
                place: null,
                marker: null,
            };
        },
        computed: {
            ...mapGetters({
                company: 'place',
            })
        },
        mounted() {
            this.$nextTick(() => {
                this.initMap();
                this.initAutocomplete();

                this.autocomplete.addListener("place_changed", () => {
                    this.place = this.autocomplete.getPlace();

                    this.$emit('place', this.place);
                    this.$emit('marker', this.marker);

                    this.map.fitBounds(this.place.geometry.viewport);
                    this.marker.setPosition(this.place.geometry.location);
                    this.marker.setVisible(true);
                });
            });
        },
        methods: {
            initMap() {
                console.log(new google.maps.LatLng(
                    this.location.lat,
                    this.location.lng
                ));
                this.map = new google.maps.Map(this.$refs.map, {
                    center: new google.maps.LatLng(
                        59.9376031, 30.3890602
                        // this.location.lat,
                        // this.location.lng
                    ),
                    // bounds: this.company.viewport,
                    // center: {
                    //     lat: 59.9376031,
                    //     lng: 0.3890602
                    // },
                    zoom: 8,
                    mapTypeControl: false,
                    panControl: false,
                    zoomControl: false,
                    streetViewControl: false
                });

                this.marker = new google.maps.Marker({
                    map: this.map,
                    anchorPoint: new google.maps.Point(0, -29),
                    draggable: true,
                });
            },
            initAutocomplete() {
                this.autocomplete = new google.maps.places.Autocomplete(
                    this.$refs.autocomplete
                );

                this.autocomplete.bindTo("bounds", this.map);
                this.autocomplete.setFields([
                    "address_components",
                    "formatted_address",
                    "formatted_phone_number",
                    "geometry",
                    "name",
                    "opening_hours",
                    "place_id",
                ]);
            },
        }
    };
</script>

<style scoped>
    .map {
        height: 480px;
    }
</style>