<template>
    <company-form @onSubmit="storeCompany()"></company-form>
</template>

<script>
    export default {
        name: "Create",
        data() {
            return {
            }
        },
        methods: {
            onSave(company) {
                axios.post('/companies', company)
                    .then(response => {
                        console.log(this.company)
                    })
            }
        }
    }
</script>

<style scoped>

</style>