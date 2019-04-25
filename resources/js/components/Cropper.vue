<template>
    <div>
        <image-upload-modal></image-upload-modal>
        <img alt="User image"
             class="img-circle user-pic m-x-auto"
             :src="userImage">
        <div class="form-group p-t-20">
            <button @click="$modal.show('image-upload')"
                    v-if="!fileLoaded"
                    class="btn btn-warning btn-sm m-x-auto">Загрузить
            </button>
            <button @click="onUpload"
                    v-if="fileLoaded"
                    class="btn btn-warning btn-sm m-x-auto">Сохранить
            </button>
            <button @click="onCancel"
                    v-if="fileLoaded"
                    class="btn btn-default btn-sm m-x-auto">Отменить
            </button>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Cropper",
        computed: {
            ...mapGetters({
                userImage: 'userImage',
                user: 'user',
                fileLoaded: 'fileLoaded'
            }),
        },
        async created() {
            await this.$store.dispatch('authUser');
        },
        methods: {
            onUpload() {
                let formData = new FormData;

                formData.append('avatar', this.user.avatar);
                formData.append('_method', 'PUT');

                axios.post('/profile', formData)
                    .then(response => {
                        this.$store.commit('setFileLoaded', false);
                    })
            },
            onCancel() {
                this.$store.dispatch('authUser');
                this.$store.commit('setFileLoaded', false);
            }
        }
    }
</script>

<style scoped>
    .user-pic {
        width: 120px;
        height: 120px;
    }
</style>
