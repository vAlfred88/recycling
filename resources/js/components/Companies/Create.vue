<template>
    <div>
        <div class="flex justify-center">
            <image-upload-modal @cropped="getFile" @preview="getPreview"
                                default-image="/images/metal.png"></image-upload-modal>
            <div class="w-1/3 text-center rounded bg-white shadow mr-10">
                <img :src="company.preview"
                     alt="Company logo"
                     class="w-54 h-64"
                >
                <div class="mt-10">
                    <button @click="$modal.show('image-upload')"
                            class="bg-orange-light text-white p-2 hover:bg-orange rounded mx-auto mr-3">Загрузить
                    </button>
                    <button @click="onCancel"
                            class="bg-grey-light p-2 hover:bg-grey text-white rounded flex-1"
                            v-if="fileLoaded">Отменить
                    </button>
                </div>
                <div class="p-10">
                    <input class="border p-3 rounded w-full"
                           id="name"
                           name="name"
                           placeholder="Название компании"
                           type="text"
                           v-model="company.name">
                </div>
            </div>
            <div class="w-2/3 bg-white rounded shadow">
                <h3 class="text-center">О компании</h3>
                <div class="p-10">
                <textarea class="p-10 w-full border rounded"
                          id="description"
                          name="description"
                          placeholder="Описание компании"
                          rows="11"
                          v-model="company.description"></textarea>
                </div>
            </div>
        </div>
        <div class="w-full mt-10 p-10 bg-white flex">
            <div class="w-1/2 mr-3">
                <input class="p-10 w-full border my-2 rounded"
                       id="site"
                       name="site"
                       placeholder="Адрес сайта"
                       type="text"
                       v-model="company.site">
                <input class="p-10 w-full border my-2 rounded"
                       id="phone"
                       name="phone"
                       placeholder="Номер телефона"
                       type="text"
                       v-model="company.phone">
                <input class="p-10 w-full border my-2 rounded"
                       id="email"
                       name="email"
                       placeholder="Email адрес"
                       type="text"
                       v-model="company.email">
            </div>
            <div class="w-1/2 ml-3">
                <input class="p-10 w-full border my-2 rounded"
                       id="inn"
                       name="inn"
                       placeholder="ИНН"
                       type="text"
                       v-model="company.inn">
                <input class="p-10 w-full border my-2 rounded"
                       id="ogrn"
                       name="ogrn"
                       placeholder="ОГРН"
                       type="text"
                       v-model="company.ogrn">
                <input class="p-10 w-full border my-2 rounded"
                       id="kpp"
                       name="kpp"
                       placeholder="КПП"
                       type="text"
                       v-model="company.kpp">
            </div>
        </div>
        <div class="w-full mt-10 p-10 bg-white">
            <gmap-autocomplete :select-first-on-enter="true"
                               :value="place.formatted_address"
                               @place_changed="setPlace"
                               class="w-full border p-3 rounded mb-5"
                               id="address"
                               placeholder="Введите адрес или название объекта">
            </gmap-autocomplete>
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
            <!--<google-map @place="getPlace" :place-id="company.place">-->
            <!--<search-box></search-box>-->
            <!--</google-map>-->
        </div>
        <div class="w-full mt-5 p-10">
            <div class="flex">
                <button @click.prevent="onSubmit"
                        class="bg-orange-light mx-auto p-10 hover:bg-orange rounded text-center text-white"
                        type="button">Сохранить
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "CreateCompany",
        props: {
            companyId: {
                required: false,
                type: String
            }
        },
        data() {
            return {
                fileLoaded: false,
            }
        },
        computed: {
            ...mapGetters({
                company: 'company',
                place: 'place',
            }),
        },
        created() {
            if (this.companyId) {
                this.$store.dispatch('getCompany', this.companyId);
            }
        },
        watch: {
            company() {
                this.$store.dispatch('getPlace', this.company.place);
            },
            place() {
                this.$refs.map.fitBounds(this.place.geometry.viewport);
            },
        },
        methods: {
            setPlace(place) {
                this.$store.commit('setPlace', place);
                this.$refs.map.fitBounds(place.geometry.viewport)
            },
            getPreview(preview) {
                this.company.preview = preview;
                this.fileLoaded = true;
            }
            ,
            getFile(file) {
                this.company.logo = file;
                this.fileLoaded = true;
            }
            ,
            onCancel() {
                this.company.preview = '/images/default.png';
                this.fileLoaded = false;
            },
            getPlace(place) {
                if (place.formatted_phone_number) {
                    this.company.phone = place.formatted_phone_number;
                }

                if (place.name) {
                    this.company.name = place.name;
                }

                this.place = place;
                this.company.address = place.formatted_address;
            },
            onSubmit() {
                let formData = new FormData;
                Object.keys(this.company).forEach(key => {
                        formData.append(key, this.company[key])
                    }
                );

                formData.append('lat', JSON.stringify(this.place.geometry.location.lat()));
                formData.append('lng', JSON.stringify(this.place.geometry.location.lng()));
                formData.append('place', this.place.place_id);
                formData.append('address', this.place.formatted_address);

                this.fileLoaded = false;

                axios.post('/companies', formData)
                    .then(response => {
                        console.log(response)
                    })
            }
        }
    }
</script>

<style scoped>

</style>