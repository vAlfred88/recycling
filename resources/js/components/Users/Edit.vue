<template>
    <section>
        <user-form @save="onSave"
                   :extended="true"
                   :user-id="userId"></user-form>
    </section>
</template>

<script>
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
        },
        methods: {
            onSave(user) {
                let formData = new FormData;
                Object.keys(user).forEach(key => formData.append(key, user[key]));

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