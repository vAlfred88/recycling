<template>
    <company-form :company-id="companyId" @onSubmit="onSave"></company-form>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "Edit",
        props: {
            companyId: {
                required: true
            }
        },
        methods: {
            onSave(company) {
                company.append('_method', 'PUT');

                axios.post('/companies/' + this.companyId, company)
                    .then(response => {
                        console.log(this.company)
                    })
            }
        }
    }
</script>

<style scoped>

</style>