<template>
    <section>
        <user-form @save="onSave"></user-form>
    </section>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Create",
        props: {
            path: {
                required: true,
                type: String
            },
        },
        methods: {
            onSave(user) {
                let formData = new FormData;
                Object.keys(user).forEach(key => formData.append(key, user[key]));

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