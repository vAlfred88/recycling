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
            <google-map @place="getPlace"
                        :location="company.location"
                        :viewport="company.viewport"
                        :address="company.address"
            ></google-map>
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
            editCompany: {
                required: false
            }
        },
        data() {
            return {
                editableCompany: {
                    name: '',
                    description: '',
                    phone: '',
                    site: '',
                    email: '',
                    address: '',
                    inn: '',
                    kpp: '',
                    ogrn: '',
                    preview: '/images/metal.png',
                    logo: ''
                },
                fileLoaded: false,
                place: ''
            }
        },
        computed: {
            ...mapGetters({
                company: 'company',
            })
        },
        methods: {
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
            getPreview(image) {
                this.company.preview = image;
                this.fileLoaded = true;
            },
            getFile(file) {
                this.company.logo = file;
                this.fileLoaded = true;
            },
            onCancel() {
                this.company.logo = '/images/metal.png';
            },
            onSubmit() {
                let formData = new FormData;
                Object.keys(this.company).forEach(key => {
                        formData.append(key, this.company[key])
                    }
                );

                formData.append('lat', this.place.geometry.location.lat());
                formData.append('lng', this.place.geometry.location.lng());
                formData.append('place', this.place.place_id);
                formData.append('south', this.place.geometry.viewport.getNorthEast().lat());
                formData.append('west', this.place.geometry.viewport.getNorthEast().lng());
                formData.append('north', this.place.geometry.viewport.getSouthWest().lat());
                formData.append('east', this.place.geometry.viewport.getSouthWest().lng());

                this.fileLoaded = false;
                this.$emit('onSubmit', formData);

                axios.post('/companies', formData)
                    .then(response => {
                        console.log(this.company)
                    })
            }
        }
    }
</script>

<style scoped>

</style>