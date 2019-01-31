<template>
    <div class="p-t-15">
        <div class="row">
            <div class="col-md-2">
                <image-upload-modal></image-upload-modal>
                <img alt="User image"
                     class="img-circle user-pic m-x-auto"
                     :src="userImage">
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
                           v-model="userObject.name"
                           v-validate="rules.name">
                    <span class="help-block">{{ errors.first('name') }}</span>
                    <p-radio :key="role.id"
                             :value="role.id"
                             color="warning"
                             name="check"
                             v-for="role in roles"
                             v-model="userObject.roles">{{ role.label }}
                    </p-radio>
                </div>
                <div :class="errors.has('position') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="position"
                           placeholder="Должность"
                           type="text"
                           v-model="userObject.position"
                           v-validate="rules.position">
                    <span class="help-block">{{ errors.first('position') }}</span>
                </div>
                <div :class="errors.has('email') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="email"
                           placeholder="Email"
                           type="text"
                           v-model="userObject.email"
                           v-validate="rules.email">
                    <span class="help-block">{{ errors.first('email') }}</span>
                </div>
                <div :class="errors.has('phone') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="phone"
                           placeholder="Номер телефона"
                           type="text"
                           v-model="userObject.phone"
                           v-validate="rules.phone">
                    <span class="help-block">{{ errors.first('phone') }}</span>
                </div>
                <div id="extended" v-if="extend">
                    <div :class="errors.has('password') ? 'has-error' : ''" class="form-group">
                        <input class="form-control"
                               name="password"
                               type="password"
                               placeholder="Пароль"
                               ref="password"
                               data-vv-as="пароль"
                               v-model="userObject.password"
                               v-validate="rules.password">
                        <span class="help-block">{{ errors.first('password') }}</span>
                    </div>
                    <div :class="errors.has('password_confirmed') ? 'has-error' : ''" class="form-group">
                        <input class="form-control"
                               name="password_confirmed"
                               type="password"
                               placeholder="Подтверждение пароля"
                               data-vv-as="подтверждение"
                               v-validate="rules.password_confirmed">
                        <span class="help-block">{{ errors.first('password_confirmed') }}</span>
                    </div>
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
                                 v-model="userObject.permissions">
                            {{ permission.label }}
                        </p-check>
                    </div>
                </div>
                <div class="flex my-10">
                    <div class="mx-auto">
                        <button @click.prevent="onSave" class="btn btn-warning mr-3">Сохранить</button>
                        <button @click.prevent="onInvite" class="btn btn-default">Отправить приглашение</button>
                    </div>
                </div>
                <info-modal>
                    <h4 class="px-6 text-center text-grey-darker mb-10" slot="header">Сообщение отправлено</h4>
                    <div class="mx-auto">Сообщение полльзователю отправлено</div>
                </info-modal>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Form",
        props: {
            user: {
                required: false,
                type: Object
            },
            roles: {
                required: true,
                type: Array
            },
            permissions: {
                required: true,
                type: Array
            },
            extend: {
                required: false,
                default: false,
                type: Boolean
            }
        },
        data() {
            return {
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
        computed: {
            ...mapGetters({
                userImage: 'userImage',
                userObject: 'user'
            })
        },
        methods: {
            onSave() {
                this.$validator.validate().then(result => {
                    if (result) {
                        this.$store.dispatch('setUser', this.userObject)
                            .then(() => {
                                this.$emit('save');
                            });
                    }
                });
            },
            onInvite() {
                this.$modal.show('info');
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