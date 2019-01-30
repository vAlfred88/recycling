<template>
    <section>
        <user-form @save="onSave"
                   :roles="roles"
                   :permissions="permissions"
                   submit-text="Отправить приглашение"></user-form>
    </section>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Create",
        props: ['path'],
        mounted() {
            this.$store.dispatch('getRoles');
            this.$store.dispatch('getPermissions');
        },
        computed: {
            ...mapGetters({
                roles: 'roles',
                permissions: 'permissions',
                newUser: 'user',
            })
        },
        methods: {
            onSave() {
                let formData = new FormData;
                Object.keys(this.newUser).forEach(key => formData.append(key, this.newUser[key]));

                this.$store.dispatch('saveUser', {
                    url: this.path,
                    data: formData
                })
            }
        }
    }
</script>

<style scoped>

</style>