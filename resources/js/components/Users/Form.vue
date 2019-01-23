<template>
    <div class="p-t-15">
        <div class="row">
            <div class="col-md-2">
                <image-upload-modal></image-upload-modal>
                <img alt="User image"
                     class="img-circle user-pic m-x-auto"
                     :src="userImage.dataUrl">
                <div class="form-group p-t-20">
                    <button @click="$modal.show('image-upload')"
                            class="btn btn-warning btn-sm m-x-auto">Загрузить
                    </button>
                </div>
            </div>
            <div class="col-md-7">
                <div :class="errors.has('name') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="name"
                           placeholder="Полное имя"
                           type="text"
                           v-model="name"
                           v-validate="rules.name">
                    <span class="help-block">{{ errors.first('name') }}</span>
                    <p-radio :key="role.id"
                             :value="role.id"
                             color="warning"
                             name="check"
                             v-for="role in roles"
                             v-model="selectedRole">{{ role.name }}
                    </p-radio>
                </div>
                <div :class="errors.has('position') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="position"
                           placeholder="Должность"
                           type="text"
                           v-model="position"
                           v-validate="rules.position">
                    <span class="help-block">{{ errors.first('position') }}</span>
                </div>
                <div :class="errors.has('email') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="email"
                           placeholder="Email"
                           type="text"
                           v-model="email"
                           v-validate="rules.email">
                    <span class="help-block">{{ errors.first('email') }}</span>
                </div>
                <div :class="errors.has('phone') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="phone"
                           placeholder="Номер телефона"
                           type="text"
                           v-model="phone"
                           v-validate="rules.phone">
                    <span class="help-block">{{ errors.first('phone') }}</span>
                </div>
            </div>
            <div class="col-md-3">
                <p class="text-right text-muted">Все города</p>
                <p class="text-right">Все пункты меню</p>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div :key="permission.id"
                         class="col-md-3 p-t-10"
                         v-for="permission in permissions">
                        <p-check :value="permission.id"
                                 class="p-switch"
                                 color="warning"
                                 v-model="selectedPermissions">
                            {{ permission.name }}
                        </p-check>
                    </div>
                </div>
                <div class="row p-t-20">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <button @click.prdevent="onUpload" class="btn btn-default">Отправить приглашение</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Form",
        data() {
            return {
                name: '',
                email: '',
                phone: '',
                selectedRole: '',
                position: '',
                selectedPermissions: [],
                rules: {
                    name: 'required|min:5|max:255',
                    email: 'required|email|min:5|max:255',
                    phone: {
                        regex: /(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/
                    },
                    position: 'max:255'
                }
            }
        },
        mounted() {
            this.$store.dispatch('getRoles');
            this.$store.dispatch('getPermissions');
        },
        computed: {
            ...mapGetters({
                userImage: 'userImage',
                roles: 'roles',
                permissions: 'permissions'
            })
        },
        methods: {
            getPermissions() {
                axios.get('/permissions')
                    .then(response => {
                        this.permissions = response.data
                    });
            },
            getRoles() {
                axios.get('/roles')
                    .then(response => {
                        this.roles = response.data
                    })
            },
            onUpload() {
                let formData = new FormData();

                formData.append('name', this.name);
                formData.append('email', this.email);
                formData.append('phone', this.phone);

                if (this.role) {
                    formData.append('role', this.role);
                }

                if (this.position) {
                    formData.append('position', this.position);
                }

                if (this.permissions)
                    formData.append('permissions', this.permissions);

                if (this.userImage) {
                    formData.append('image', this.userImage.blob);
                }

                axios.post('/users', formData)
                    .then(response => {
                        this.name = '';
                        this.email = '';
                        this.phone = '';
                        this.selectedRole = '';
                        this.position = '';
                        this.selectedPermissions = [];
                        this.$store.commit('setUserImage', '/images/default.png');
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        }
    }
</script>

<style scoped>
    .user-pic {
        width: 120px;
        height: 120px;
    }

    .form-control {
        border: 0;
        border-bottom: 1px solid #e5ebec;
    }

    .m-x-auto {
        margin-left: auto;
        margin-right: auto;
        display: flex;
    }
</style>