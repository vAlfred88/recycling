<template>
    <div>
        <!--<div class="w-full">-->
        <div ref="map"
             class="w-full mx-15 h-50 map overflow-hidden py-10 mb-10 rounded border bod border-grey-light"></div>
        <!--</div>-->

        <div class="w-full">
            <div class="mb-10">
                <input ref="autocomplete"
                       placeholder="Введите адрес или название объекта"
                       class="block w-full border-b border-orange-light mx-15"
                       name="address"
                       id="address"
                       type="text">
            </div>

            <div class="w-1/2 mb-10 align-baseline">
                <input placeholder="Номер телефона"
                       class="flex-1 border-b border-orange-light mx-15"
                       v-model="phone"
                       name="phone"
                       id="phone"
                       type="text">
            </div>

            <div class="w-full mb-10 border-t border-grey-light">
                <h3 class="text-muted">Услуги</h3>
                <div class="flex flex-wrap align-baseline my-10">
                    <div class="flex-1 mx-3" v-for="service in services" :key="service.id">
                        <p-check :value="service.id"
                                 class="p-switch"
                                 color="warning"
                                 v-model="selectedService">
                            {{ service.name }}
                        </p-check>
                    </div>
                </div>
            </div>

            <div class="mb-10 w-full align-baseline border-t border-grey-light">
                <h3 class="text-muted">Режим работы</h3>
                <div class="flex flex-wrap align-baseline my-10">
                    <div v-for="(day, key) in periods" :key="key" class="py-3 ml-12 w-1/5">
                        <div class="w-auto">
                            <span class="bg-orange-light block text-uppercase text-center rounded text-white">
                                {{ day.open.day | week_day }}
                            </span>
                        </div>
                        <!--fixme-->
                        <input type="text"
                               class="border-b align-baseline text-center border-orange-light w-auto"
                               :value="getTime(day.open)">
                        <input type="text"
                               class="border-b align-baseline text-center border-orange-light w-auto"
                               :value="getTime(day.close)">
                    </div>
                </div>
            </div>

            <div class="flex">
                <button type="button"
                        @click.prevent="onSubmit"
                        class="h-12 bg-orange-light hover:bg-orange text-center text-white rounded p-3 mx-auto">Добавить
                </button>
            </div>

            <!--<div class="w-full align-baseline border-t border-grey-light">-->
            <!--<h3 class="text-muted">Сотрудники</h3>-->
            <!--<div class="w-1/4 flex align-baseline my-10">-->
            <!--<div class="relative block w-full">-->
            <!--<input type="text"-->
            <!--class="border-b w-full mr-2 align-baseline border-orange-light"-->
            <!--@keyup="onUserSearch"-->
            <!--v-model="search"-->
            <!--placeholder="Введите имя сотрудника">-->
            <!--<div class="absolute z-50 shadow-lg bg-white overflow-auto text-xl w-full" v-if="isUserFind">-->
            <!--<div class="p-2 cursor-pointer border-b rounded hover:bg-grey-light"-->
            <!--v-for="user in users">{{ user.name }}-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div class="w-8 h-8 bg-orange-light rounded-full text-white text-center">-->
            <!--<button type="button">-->
            <!--<i class="p-1 fa fa-plus"></i>-->
            <!--</button>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "GoogleMap",
        data() {
            return {
                map: null,
                autocomplete: null,
                place: null,
                marker: null,
                work_time: [],
                services: [],
                selectedService: [],
                isUserFind: false,
                users: [],
                search: ''
            };
        },
        filters: {
            week_day(day) {
                return moment(day, "e").format("dd");
            },
            time(time) {
                return moment(time, "h").format("HH:mm");
            }
        },
        computed: {
            periods() {
                if (this.place) {
                    if (this.place.opening_hours)
                    return this.place.opening_hours.periods;
                }

                return this.work_time;
            },
            address() {
                if (this.place) {
                    return this.place.formatted_address
                }
            },
            phone() {
                if (this.place) {
                    return this.place.formatted_phone_number
                }

                return '';
            },
        },
        mounted() {
            this.initMap();
            this.initAutocomplete();
            this.generateWeek();
            this.getServices();
            this.getUsers();

            this.autocomplete.addListener("place_changed", () => {
                this.place = this.autocomplete.getPlace();
                console.log(this.place);
                this.map.fitBounds(this.place.geometry.viewport);
                this.marker.setPosition(this.place.geometry.location);
                this.marker.setVisible(true);
            });
        },
        methods: {
            onSubmit(){
                let data = {
                    address: this.place.formatted_address,
                    phone: this.place.formatted_phone_number,
                    lat: this.place.geometry.location.lat(),
                    lng: this.place.geometry.location.lng(),
                    periods: this.periods,
                    services: this.selectedService
                };
                axios.post('/receptions', data)
                    .then(response => {
                        console.log(response)
                    })
            },
            initMap() {
                this.map = new google.maps.Map(this.$refs.map, {
                    center: {lat: -34.397, lng: 150.644},
                    zoom: 8,
                    mapTypeControl: false,
                    panControl: false,
                    zoomControl: false,
                    streetViewControl: false
                });

                this.marker = new google.maps.Marker({
                    map: this.map,
                    anchorPoint: new google.maps.Point(0, -29)
                });
            },
            getUsers() {
                axios.get('/users')
                    .then(response => {
                        this.users = response.data
                    })
            },
            onUserSearch() {
                this.isUserFind = true;
                this.users.filter(function (user) {

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
                    "opening_hours"
                ]);
            },
            getServices() {
                axios.get('/services')
                    .then(response => {
                        this.services = response.data
                    })
            },
            getTime(time) {
                return moment(time.hours + ":" + time.minutes, "HH:mm").format("HH:mm");
            },
            generateWeek() {
                let i = 0;
                for (i = 0; i <= 6; i++) {
                    this.work_time.push({
                        open: {
                            day: i,
                            hours: "09",
                            minutes: "00",
                            time: '0900'
                        },
                        close: {
                            day: i,
                            hours: "18",
                            minutes: "00",
                            time: '1800'
                        }
                    });
                }
            }
        }
    };
</script>

<style scoped>
    .map {
        height: 480px;
    }
</style>