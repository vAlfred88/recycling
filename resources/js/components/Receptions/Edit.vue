<template>
    <div class="">
        <div class="w-full mt-10 p-10 bg-white">
            <gmap-autocomplete :select-first-on-enter="true"
                               @place_changed="setPlace"
                               class="w-full border p-3 rounded mb-5"
                               id="address"
                               placeholder="Введите адрес или название объекта"
                               :value="place.formatted_address">
            </gmap-autocomplete>
            <div class="mb-5">
                <input :class="errors.has('phone') ? 'border-red' : ''"
                       class="w-full border p-3 rounded mb-2"
                       data-vv-as="телефон"
                       id="phone"
                       name="phone"
                       placeholder="Номер телефона"
                       type="text"
                       v-model="reception.phone"
                       v-validate="rules.phone">
                <span class="text-red">{{ errors.first('phone') }}</span>
            </div>
            <div class="overflow-hidden rounded">
                <GmapMap :center="{lat: parseFloat(reception.place.lat), lng: parseFloat(reception.place.lng)}"
                         v-if="reception.place"
                         :zoom="15"
                         map-type-id="terrain"
                         ref="map"
                         style="height: 480px">
                    <GmapMarker :clickable="true"
                                :draggable="true"
                                :position="{lat: parseFloat(reception.place.lat), lng: parseFloat(reception.place.lng)}"
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
            <div class="w-full align-baseline">
                <transition-group name="users"
                                  mode="out-in"
                                  tag="div"
                                  class="flex flex-wrap">
                    <div class="w-1/5"
                         v-for="user in users"
                         :key="user.id"
                         @click="check(user.id)">
                        <input type="checkbox" :ref="`user-${user.id}`"
                               v-model="reception.users" :value="user.id">
                        <div class="mx-auto user-box">
                            <div class="text-center mb-10">
                                <img :src="user.preview"
                                     class="image"
                                     :alt="user.name">
                            </div>
                            <div class="w-full text-center text-2xl mb-5 break-words">
                                {{ user.name }}
                            </div>
                            <div class="w-full text-center text-xl mb-5">
                                {{ user.position }}
                            </div>
                            <div class="w-full text-center text-xl mb-10 break-words">
                                {{ user.email }}
                            </div>
                        </div>
                    </div>
                </transition-group>
            </div>
        </div>

        <div class="flex">
            <button @click.prevent="onSubmit"
                    class="h-12 bg-orange-light hover:bg-orange text-center text-white rounded p-3 mx-auto"
                    type="button">Сохранить
            </button>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: "EditReception",
        props: {
            receptionId: {
                required: true,
            }
        },
        data() {
            return {
                work_time: [],
                isUserFind: false,
                search: '',
                rules: {
                    address: 'required',
                    phone: {
                        regex: /(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/
                    },
                }
            };
        },
        filters: {
            week_day(day) {
                return moment(day, "e").format("dd");
            },
            time(time) {
                return moment(time, "h").format("HH:mm");
            },
        },
        computed: {
            ...mapGetters({
                reception: 'reception',
                services: 'services',
                place: 'place',
                users: 'users',
            }),
            periods() {
                if (this.place) {
                    if (this.place.opening_hours)
                        return this.place.opening_hours.periods;
                }

                return this.work_time;
            },
        },
        watch: {
            place() {
                this.$refs.map.fitBounds(this.place.geometry.viewport);
            },
        },
        async created() {
            await this.$store.dispatch('getReception', this.receptionId);
            await this.$store.dispatch('getServices');
            await this.$store.dispatch('getEmployees');
            this.generateWeek();
        },
        methods: {
            setPlace(place) {
                this.$store.commit('setPlace', place);
                this.$refs.map.fitBounds(place.geometry.viewport);
                this.reception.phone = this.place.international_phone_number;
                this.reception.address = this.place.formatted_address;
            },
            getPlaceCity() {
                let result =  _.find(this.place.address_components , function(obj) {
                    return obj.types[0] === 'locality' && obj.types[1] === 'political';
                });

                return result ? result.long_name : null
            },
            onSubmit() {
                this.$validator.validate().then(result => {
                    if (result) {
                        if (this.reception.address) {
                            this.reception.lat = JSON.stringify(this.place.geometry.location.lat);
                            this.reception.lng = JSON.stringify(this.place.geometry.location.lng);
                            this.reception.place = this.place.place_id;
                            this.reception.address = this.place.formatted_address;
                            this.reception.periods = this.periods;
                            this.reception.city = this.getPlaceCity();
                            if (this.place.international_phone_number) {
                                this.reception.phone = this.place.international_phone_number
                            }
                        }

                        axios.put('/api/receptions/' + this.receptionId, this.reception)
                            .then(response => {
                                window.location.href = '/receptions';
                            })
                    }
                });
            },
            getTime(time) {
                return moment(time.hours + ":" + time.minutes, "HH:mm").format("HH:mm");
            },
            check(payload) {
                let el = `user-${payload}`;
                this.$refs[el][0].click()
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
    input[type=checkbox] {
        @apply hidden;
    }

    input[type=checkbox]:checked + div {
        @apply border rounded border-orange-light shadow;
    }

    .user-box {
        @apply align-baseline my-10 mx-3 p-3 cursor-pointer;
    }

    .user-box:hover {
        @apply bg-white border border-orange-light rounded shadow;
    }
</style>
