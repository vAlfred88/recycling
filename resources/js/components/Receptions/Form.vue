<template>
    <div class="">
        <div class="w-full mt-10 p-10 bg-white">
            <gmap-autocomplete :select-first-on-enter="true"
                               :value="place.formatted_address"
                               @place_changed="setPlace"
                               class="w-full border p-3 rounded mb-5"
                               id="address"
                               placeholder="This is a placeholder text">
            </gmap-autocomplete>
            <input placeholder="Номер телефона"
                   class="w-full border p-3 rounded mb-5"
                   v-model="reception.phone"
                   name="phone"
                   id="phone"
                   type="text">
            <div class="overflow-hidden rounded">
                <GmapMap :center="place.geometry.location"
                         :zoom="7"
                         map-type-id="terrain"
                         ref="map"
                         style="height: 480px">
                    <GmapMarker :clickable="true"
                                :draggable="true"
                                :position="place.geometry.location"
                                class="mx-15 overflow-hidden"/>
                </GmapMap>
            </div>
        </div>

        <div class="w-full">
            <div class="w-full mb-10 border-t border-grey-light">
                <h3 class="text-muted">Услуги</h3>
                <div class="flex flex-wrap align-baseline my-10">
                    <div :key="service.id" class="flex-1 mx-3" v-for="service in services">
                        <p-check :value="service.id"
                                 class="p-switch"
                                 color="warning"
                                 v-model="reception.services">
                            {{ service.name }}
                        </p-check>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-10 w-full align-baseline border-t border-grey-light">
            <h3 class="text-muted">Режим работы</h3>
            <div class=" my-10">
                <div class="w-1/3 mx-auto">
                    <div :key="key" class="flex align-baseline py-3" v-for="(day, key) in periods">
                        <div class="w-1/3 px-2 mx-2">
                            <span class="bg-orange-light block text-uppercase text-center rounded text-white">
                                {{ day.open.day | week_day }}
                            </span>
                        </div>
                        <!--fixme-->
                        <input :value="getTime(day.open)"
                               class="border-b mx-2 align-baseline text-center border-orange-light w-1/3"
                               type="text">
                        <input :value="getTime(day.close)"
                               class="border-b mx-2 align-baseline text-center border-orange-light w-1/3"
                               type="text">
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full align-baseline border-t border-grey-light">
            <h3 class="text-muted">Сотрудники</h3>
            <div class="flex flex-wrap">
                <div class="m-3 p-3 bg-orange-light rounded text-white" v-for="user in reception.users">
                    {{ user.name }} <i class="fa fa-times-circle cursor-pointer" @click="onRemove(user)"></i>
                </div>
            </div>
            <div class="w-1/4 flex align-baseline my-10">
                <div class="relative block w-full">
                    <input type="text"
                           class="border-b w-full mr-2 align-baseline border-orange-light"
                           @input="onUserSearch"
                           @focus="onUserSearch"
                           v-model="search"
                           placeholder="Введите имя сотрудника">
                    <div class="absolute z-50 shadow-lg bg-white overflow-auto text-xl w-full h-auto"
                         v-if="isUserFind">
                        <div class="p-2 cursor-pointer border-b rounded hover:bg-grey-light"
                             @click="onSelect(user)"
                             v-for="user in results">{{ user.name }}
                        </div>
                    </div>
                </div>
                <div class="w-8 h-8 bg-orange-light rounded-full text-white text-center">
                    <button type="button">
                        <i class="p-1 fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="flex">
            <button type="button"
                    @click.prevent="onSubmit"
                    class="h-12 bg-orange-light hover:bg-orange text-center text-white rounded p-3 mx-auto">Добавить
            </button>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Form",
        data() {
            return {
                work_time: [],
                services: [],
                isUserFind: false,
                users: [],
                search: '',
                // result: [],
                reception: {
                    phone: '',
                    address: '',
                    users: [],
                    services: [],
                    lat: '',
                    lng: '',
                    periods: []
                }
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
            ...mapGetters({
                company: 'company',
                place: 'place',
            }),
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
            results() {
                return this.users.filter((item) => {
                    return item.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                });
            }
        },
        mounted() {
            this.generateWeek();
            this.getServices();
            this.getUsers();
        },
        methods: {
            setPlace(place) {
                this.$store.commit('setPlace', place);
                this.$refs.map.fitBounds(place.geometry.viewport)
            },
            onSubmit() {
                this.reception.address = this.place.formatted_address;

                if (this.place.formatted_phone_number) {
                    this.reception.phone = this.place.formatted_phone_number
                }

                if (this.reception.user) {
                    this.reception.users = this.reception.users.map((user) => {
                        return user.id
                    })
                }

                console.log(this.reception.users);

                this.reception.lat = this.place.geometry.location.lat();
                this.reception.lng = this.place.geometry.location.lng();
                this.reception.periods = this.periods;

                axios.post('/receptions', this.reception)
                    .then(response => {
                        console.log(response)
                    })
            },
            initMap() {
                this.map = new google.maps.Map(this.$refs.map, {
                    center: {
                        lat: 55.751244,
                        lng: 37.618423
                    },
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
            },
            onSelect(user) {
                this.isUserFind = false;
                this.reception.users.push(user);
                this.users.splice(this.users.indexOf(user), 1);
            },
            onRemove(user) {
                this.users.push(user);
                this.reception.users.splice(this.reception.users.indexOf(user), 1);
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
    }
</script>

<style scoped>

</style>