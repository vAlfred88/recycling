<template>
    <div>
        <div class="flex justify-center">
            <image-upload-modal default-image="/images/metal.png" @cropped="getFile"
                                @preview="getPreview"></image-upload-modal>
            <div class="w-1/3 text-center rounded bg-white shadow mr-10">
                <img alt="Company logo"
                     class="w-54 h-64"
                     :src="company.preview"
                >
                <div class="mt-10">
                    <button @click="$modal.show('image-upload')"
                            class="bg-orange-light text-white p-2 hover:bg-orange rounded mx-auto mr-3">Загрузить
                    </button>
                    <button @click="onCancel"
                            v-if="fileLoaded"
                            class="bg-grey-light p-2 hover:bg-grey text-white rounded flex-1">Отменить
                    </button>
                </div>
                <div class="p-10">
                    <input type="text"
                           id="name"
                           name="name"
                           v-model="company.name"
                           class="border p-3 rounded w-full"
                           placeholder="Название компании">
                </div>
            </div>
            <div class="w-2/3 bg-white rounded shadow">
                <h3 class="text-center">О компании</h3>
                <div class="p-10">
                <textarea name="description"
                          id="description"
                          rows="11"
                          v-model="company.description"
                          class="p-10 w-full border rounded"
                          placeholder="Описание компании"></textarea>
                </div>
            </div>
        </div>
        <div class="w-full mt-10 p-10 bg-white flex">
            <div class="w-1/2 mr-3">
                <input type="text"
                       id="site"
                       name="site"
                       v-model="company.site"
                       class="p-10 w-full border my-2 rounded"
                       placeholder="Адрес сайта">
                <input type="text"
                       id="phone"
                       name="phone"
                       v-model="company.phone"
                       class="p-10 w-full border my-2 rounded"
                       placeholder="Номер телефона">
                <input type="text"
                       id="email"
                       name="email"
                       v-model="company.email"
                       class="p-10 w-full border my-2 rounded"
                       placeholder="Email адрес">
            </div>
            <div class="w-1/2 ml-3">
                <input type="text"
                       id="inn"
                       name="inn"
                       v-model="company.inn"
                       class="p-10 w-full border my-2 rounded"
                       placeholder="ИНН">
                <input type="text"
                       id="ogrn"
                       name="ogrn"
                       v-model="company.ogrn"
                       class="p-10 w-full border my-2 rounded"
                       placeholder="ОГРН">
                <input type="text"
                       id="kpp"
                       name="kpp"
                       v-model="company.kpp"
                       class="p-10 w-full border my-2 rounded"
                       placeholder="КПП">
            </div>
        </div>
        <div class="w-full mt-10 p-10 bg-white">
            <gmap-autocomplete placeholder="This is a placeholder text"
                               @place_changed="setPlace"
                               :value="place.formatted_address"
                               id="address"
                               :select-first-on-enter="true"
                               class="w-full border p-3 rounded mb-5">
            </gmap-autocomplete>
            <div class="overflow-hidden rounded">
                <GmapMap :center="place.geometry.location"
                         :zoom="7"
                         ref="map"
                         map-type-id="terrain"
                         style="height: 480px">
                    <GmapMarker :position="place.geometry.location"
                                :clickable="true"
                                class="mx-15 overflow-hidden"
                                :draggable="true"/>
                </GmapMap>
            </div>
            <!--<google-map @place="getPlace" :place-id="company.place">-->
            <!--<search-box></search-box>-->
            <!--</google-map>-->
        </div>
        <div class="w-full mt-5 p-10">
            <div class="flex">
                <button type="button"
                        @click.prevent="onSubmit"
                        class="bg-orange-light mx-auto p-10 hover:bg-orange rounded text-center text-white">Сохранить
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Form",
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

                this.$emit('onSubmit', formData);
            }
        }
    }
</script>

<style scoped>

</style>