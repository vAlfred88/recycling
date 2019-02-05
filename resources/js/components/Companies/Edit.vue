<template>
    <company-form :edit-company="company"></company-form>
</template>

<script>
    export default {
        name: "Edit",
        props: {
            companyId: {
                required: true
            }
        },
        data() {
            return {
                company: null
            }
        },
        created() {
            this.$store.dispatch('getCompany', this.companyId)
        },
    }
</script>

<style scoped>

</style>