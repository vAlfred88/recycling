<template>
    <div class="m-10 text-center">
        <image-upload-modal default-image="/images/default.png" @cropped="getFile"
                            @preview="getPreview"></image-upload-modal>
        <img alt="Avatar"
             class="w-54 h-64"
             :src="user.preview"
        >
        <div class="mt-10">
            <button @click="$modal.show('image-upload')"
                    v-if="!fileLoaded"
                    class="bg-orange-light text-white p-2 hover:bg-orange rounded mx-auto mr-3">Загрузить
            </button>
            <div  v-if="fileLoaded">
            <button @click="onUpload"
                    class="bg-orange-light text-white p-2 hover:bg-orange rounded mx-auto mr-3">Сохранить
            </button>
            <button @click="onCancel"
                    class="bg-grey-light p-2 hover:bg-grey text-white rounded flex-1">Отменить
            </button>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Profile",
        props: {
            userId: {
                required: false
            },
            path: {
                required: true
            }
        },
        data() {
            return {
                fileLoaded: false,
            }
        },
        mounted() {
            this.$store.dispatch('getUser', this.userId);
        },
        computed: {
            ...mapGetters({
                user: 'user',
            })
        },
        methods: {
            getPreview(preview) {
                this.user.preview = preview;
                this.fileLoaded = true;
            },
            getFile(file) {
                this.user.avatar = file;
                this.fileLoaded = true;
            },
            onCancel() {
                this.user.preview = '/images/default.png';
                this.fileLoaded = false;
            },
            onUpload() {
                let formData = new FormData;
                Object.keys(this.user).forEach(key => formData.append(key, this.user[key]));

                formData.append('_method', 'PUT');

                this.$store.dispatch('updateUser', {
                    url: this.path,
                    data: formData
                })
                    .then(() => {
                        this.fileLoaded = false;
                    })
            }

        }
    }
</script>

<style scoped>

</style>