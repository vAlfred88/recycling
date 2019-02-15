<template>
    <div>
        <image-upload-modal default-image="/images/default.png" @cropped="getFile"
                            @preview="getPreview"></image-upload-modal>
        <div class="flex flex-row p-10 rounded bg-white shadow">
            <div class="w-1/5 m-10 text-center">
                <img alt="Avatar"
                     class="w-54 h-64"
                     :src="user.preview"
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
            </div>
            <div class="w-3/5">
                <div :class="errors.has('name') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="name"
                           placeholder="Полное имя"
                           type="text"
                           v-model="user.name"
                           v-validate="rules.name">
                    <span class="help-block">{{ errors.first('name') }}</span>
                    <p-radio :key="role.id"
                             :value="role.id"
                             color="warning"
                             name="check"
                             v-for="role in roles"
                             v-model="user.roles">{{ role.label }}
                    </p-radio>
                </div>
                <div :class="errors.has('position') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="position"
                           placeholder="Должность"
                           type="text"
                           v-model="user.position"
                           v-validate="rules.position">
                    <span class="help-block">{{ errors.first('position') }}</span>
                </div>
                <div :class="errors.has('email') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="email"
                           placeholder="Email"
                           type="text"
                           v-model="user.email"
                           v-validate="rules.email">
                    <span class="help-block">{{ errors.first('email') }}</span>
                </div>
                <div :class="errors.has('phone') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="phone"
                           placeholder="Номер телефона"
                           type="text"
                           v-model="user.phone"
                           v-validate="rules.phone">
                    <span class="help-block">{{ errors.first('phone') }}</span>
                </div>
                <div id="extended" v-if="extended">
                    <div :class="errors.has('password') ? 'has-error' : ''" class="form-group">
                        <input class="form-control"
                               name="password"
                               type="password"
                               placeholder="Пароль"
                               ref="password"
                               data-vv-as="пароль"
                               v-model="user.password"
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
            <div class="w-1/5">
                <p class="text-right">Все города</p>
                <p class="text-right">Все пункты меню</p>
            </div>
        </div>
        <div class="w-full p-10 rounded bg-white shadow">
            <div class="flex flex-wrap">
                <div :key="permission.id"
                     class="pt-3 w-1/4"
                     v-for="permission in permissions">
                    <p-check :value="permission.id"
                             class="p-switch break-words"
                             color="warning"
                             v-model="user.permissions">
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
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Form",
        props: {
            userId: {
                required: false,
                type: String
            },
            extended: {
                required: false,
                type: Boolean
            }
        },
        mounted() {
            if (this.userId) {
                this.$store.dispatch('getUser', this.userId);
            }
            this.$store.dispatch('getRoles');
            this.$store.dispatch('getPermissions');
        },
        computed: {
            ...mapGetters({
                user: 'user',
                roles: 'roles',
                permissions: 'permissions',
            }),
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
                },
                fileLoaded: false,
            }
        },
        methods: {
            getPreview(preview) {
                this.user.preview = preview;
                this.fileLoaded = true;
            }
            ,
            getFile(file) {
                this.user.avatar = file;
                this.fileLoaded = true;
            }
            ,
            onCancel() {
                this.user.preview = '/images/default.png';
                this.fileLoaded = false;
            },
            onSave() {
                this.$validator.validate().then(result => {
                    if (result) {
                        this.$emit('save', this.user);
                        this.fileLoaded = false;
                        this.$validator.reset();
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