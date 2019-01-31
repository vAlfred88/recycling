<template>
    <section>
        <user-form @save="onSave"
                   :roles="roles"
                   :extend="extended"
                   :permissions="permissions"
                   :user="user"></user-form>
    </section>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Edit",
        props: {
            userId: {
                required: false
            },
            path: {
                required: true,
                type: String
            },
            extended: {
                required: false,
                type: Boolean
            }
        },
        mounted() {
            this.$store.dispatch('getUser', this.userId);
            this.$store.dispatch('getRoles');
            this.$store.dispatch('getPermissions');
        },
        computed: {
            ...mapGetters({
                user: 'user',
                roles: 'roles',
                permissions: 'permissions',
            })
        },
        methods: {
            onSave() {
                let formData = new FormData;
                Object.keys(this.user).forEach(key => formData.append(key, this.user[key]));

                formData.append('_method', 'PUT');

                this.$store.dispatch('updateUser', {
                    url: this.path,
                    data: formData
                })
            }
        }
    }
</script>

<style scoped>

</style>