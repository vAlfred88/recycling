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
                           v-validate="'required'"
                           v-model="company.name">
                    <span class="text-red">{{ errors.first('name') }}</span>

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
                Адрес сайта
                <input class="p-10 w-full border my-2 rounded"
                       id="site"
                       name="site"
                       placeholder="Адрес сайта"
                       type="text"
                       v-model="company.site">
                Номер телефона
                <input class="p-10 w-full border my-2 rounded"
                       id="phone"
                       name="phone"
                       placeholder="Номер телефона"
                       type="text"
                       v-model="company.phone">
                Email адрес
                <input class="p-10 w-full border my-2 rounded"
                       id="email"
                       name="email"
                       placeholder="Email адрес"
                       type="text"
                       v-validate = "'required|email'"
                       v-model="company.email">
            </div>
            <div class="w-1/2 mс-3">
                ИНН
                <input class="p-10 w-full border my-2 rounded"
                       id="inn"
                       name="inn"
                       placeholder="ИНН"
                       type="text"
                       v-validate="'numeric'"
                       v-model="company.inn">
                ОГРН
                <input class="p-10 w-full border my-2 rounded"
                       id="ogrn"
                       name="ogrn"
                       placeholder="ОГРН"
                       type="text"
                       v-validate="'numeric'"
                       v-model="company.ogrn">
                КПП
                <input class="p-10 w-full border my-2 rounded"
                       id="kpp"
                       name="kpp"
                       placeholder="КПП"
                       type="text"
                       v-validate="'numeric'"
                       v-model="company.kpp">
            </div>
            <div class="w-1/2 ml-3">
                Instagram компании
                <input class="p-10 w-full border my-2 rounded"
                       id="instagram"
                       name="instagram"
                       placeholder="Instagram компании"
                       type="text"
                       v-model="company.instagram">
                Vk компании
                <input class="p-10 w-full border my-2 rounded"
                       id="vk"
                       name="vk"
                       placeholder="Vk компании"
                       type="text"
                       v-model="company.vk">
                Facebook компании
                <input class="p-10 w-full border my-2 rounded"
                       id="facebook"
                       name="facebook"
                       placeholder="Facebook компании"
                       type="text"
                       v-model="company.facebook">
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

        </div>

        <div class="w-full align-baseline">
            <h3 class="text-muted">Администратор компании</h3>
            <transition name="owner" mode="out-in">
                <div class="w-full flex align-baseline my-10" key="owner" v-if="hasOwner">
                    <div class="w-full mx-auto">
                        <div class="w-full text-center mb-10">
                            <img :src="company.owner.preview"
                                 class="image"
                                 :alt="company.owner.name">
                        </div>
                        <div class="w-full text-center text-2xl mb-10 break-words">{{ company.owner.name }}</div>
                        <div class="w-full text-center text-xl mb-10">{{ company.owner.email }}</div>
                        <div class="w-full text-center">
                            <button
                                class="bg-orange-light mx-auto p-10 hover:bg-orange rounded text-center text-white"
                                @click.prevent="onChange"
                            >
                                Изменить
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex-wrap flex mx-auto w-full mx-auto my-10" key="owners" v-else>
                    <div v-for="user in users" :key="user.id" class="w-1/3">
                        <div class="w-full text-center mb-10">
                            <img :src="user.preview"
                                 class="image"
                                 :alt="user.name">
                        </div>
                        <div class="w-full text-center text-2xl mb-10 break-words">{{ user.name }}</div>
                        <div class="w-full text-center text-xl mb-10">{{ user.email }}</div>
                        <div class="w-full text-center">
                            <button
                                class="bg-orange-light mx-auto p-10 hover:bg-orange rounded text-center text-white"
                                @click.prevent="chooseOwner(user)"
                            >
                                Выбрать
                            </button>
                        </div>
                    </div>
                </div>
            </transition>
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
        data() {
            return {
                fileLoaded: false,
                rules: {
                    address: {
                        required: true
                    },
                    phone: {
                        required: true,
                        regex: /(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/
                    },
                },
                company: {
                    preview: 'https://via.placeholder.com/250x250.png?text=Logo',
                    owner: null
                }
            }
        },
        computed: {
            ...mapGetters({
                place: 'place',
                users: 'users'
            }),
            hasOwner() {
                return !! this.company.owner;
            }
        },
        async created() {
            await this.$store.dispatch('getOwners');
        },
        watch: {
            async company() {
                await this.$store.dispatch('getPlace', this.company.place);
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
            },
            getFile(file) {
                this.company.logo = file;
                this.fileLoaded = true;
            },
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
            getPlaceCity() {
                let result =  _.find(this.place.address_components , function(obj) {
                    return obj.types[0] === 'locality' && obj.types[1] === 'political';
                });

                return result ? result.long_name : null
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
                formData.append('city', this.getPlaceCity());

                this.fileLoaded = false;
                axios.post('/api/companies', formData)
                    .then(response => {
                        window.location.href = '/company';
                    })
            },
            onChange() {
                if (this.company.owner) {
                    this.users.push(this.company.owner);
                    this.company.owner = null
                }
            },
            chooseOwner(user) {
                this.users.splice(this.users.indexOf(user), 1);
                this.company.owner = user;
                this.company.ownerid = user.id;
            }
        }
    }
</script>

<style scoped>
    .owner-enter-active {
        transition: all 1s;
    }

    .owner-leave-active {
        transition: all 0.5s;
    }

    .owner-enter {
        opacity: 0;
        transform: translateX(100%);
    }

    .owner-leave-to {
        opacity: 0;
        transform: translateX(-100%);
    }

    .owner-move {
        transition: transform 0.5s ease;
    }

    .image {
        height: 100px;
        width: 100px;
    }
</style>
