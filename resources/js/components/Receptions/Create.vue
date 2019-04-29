<template>
    <div class="">
        <div class="w-full mt-10 p-10 bg-white">
            <div class="mb-5">
                <gmap-autocomplete :class="errors.has('address') ? 'border-red' : ''"
                                   :select-first-on-enter="true"
                                   :value="place.formatted_address"
                                   @place_changed="setPlace"
                                   class="w-full border p-3 rounded mb-2"
                                   data-vv-as="адрес или объект"
                                   id="address"
                                   name="address"
                                   placeholder="Введите адрес или название объекта">
                </gmap-autocomplete>
                <input type="text" name="address" v-model="reception.address" v-validate="rules.address" v-show="false">
                <span class="text-red">{{ errors.first('address') }}</span>
            </div>
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
                    {{ user.name }} <i @click="onRemove(user)" class="fa fa-times-circle cursor-pointer"></i>
                </div>
            </div>
            <div class="w-1/4 flex align-baseline my-10">
                <div class="relative block w-full">
                    <input @focus="onUserSearch"
                           @input="onUserSearch"
                           class="border-b w-full mr-2 align-baseline border-orange-light"
                           placeholder="Введите имя сотрудника"
                           type="text"
                           v-model="search">
                    <div class="absolute z-50 shadow-lg bg-white overflow-auto text-xl w-full h-auto"
                         v-if="isUserFind">
                        <div @click="onSelect(user)"
                             class="p-2 cursor-pointer border-b rounded hover:bg-grey-light"
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
            <button @click.prevent="onSubmit"
                    class="h-12 bg-orange-light hover:bg-orange text-center text-white rounded p-3 mx-auto"
                    type="button">Добавить
            </button>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: "CreateReception",
        data() {
            return {
                work_time: [],
                isUserFind: false,
                search: '',
                rules: {
                    address: {
                        required: true
                    },
                    phone: {
                        required: true,
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
            }
        },
        computed: {
            ...mapGetters({
                place: 'place',
                services: 'services',
                reception: 'reception',
                users: 'users'
            }),
            periods() {
                if (this.place) {
                    if (this.place.opening_hours)
                        return this.place.opening_hours.periods;
                }

                return this.work_time;
            },
            results() {
                return this.users.filter((item) => {
                    return item.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                });
            }
        },
        async created() {
            await this.$store.dispatch('getServices');
            this.generateWeek();
            await this.$store.dispatch('getEmployees');
            await this.$store.dispatch('getServices');
        },
        methods: {
            setPlace(place) {
                this.$store.commit('setPlace', place);
                this.$refs.map.fitBounds(place.geometry.viewport);
                this.reception.phone = this.place.international_phone_number;
                this.reception.address = this.place.formatted_address;
            },
            onSubmit() {
                this.$validator.validate().then(result => {
                    if (result) {

                        if(this.reception.address) {
                            this.reception.lat = JSON.stringify(this.place.geometry.location.lat());
                            this.reception.lng = JSON.stringify(this.place.geometry.location.lng());
                            this.reception.place = this.place.place_id;
                            this.reception.address = this.place.formatted_address;

                            if (this.place.international_phone_number) {
                                this.reception.phone = this.place.international_phone_number
                            }
                        }

                        axios.post('/receptions/', this.reception)
                            .then(response => {
                                window.location.href = '/receptions';
                            })
                    }
                });
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
