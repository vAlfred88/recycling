<template>
    <div>
        <div class="form-group">
            <label class="control-label col-md-4" for="roles">Выберите роли</label>
            <div class="col-md-6">
                <select class="form-control" id="roles" multiple name="user_roles" v-model="selectedRoles">
                    <option :value="role.id" v-for="role in roles">{{ role.label }}</option>
                </select>
            </div>
        </div>
        <div class="form-group" v-if="selectOwner">
            <label class="control-label col-md-4" for="company">Выберите компанию</label>
            <div class="col-md-6">
                <select class="form-control" id="company" name="company" required v-model="selectedCompany">
                    <option :value="company.id" v-for="company in companies">{{ company.name }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getRoles();
            this.getCompanies();
        },
        data() {
            return {
                roles: null,
                companies: null,
                selectedRoles: [],
                selectedCompany: []
            }
        },
        computed: {
            selectOwner() {
                return this.selectedRoles.includes(2);
            }
        },
        methods: {
            getRoles() {
                axios.get('/roles')
                    .then(response => {
                        this.roles = response.data
                    })
            },
            getCompanies() {
                axios.get('/companies')
                    .then(response => {
                        this.companies = response.data
                    })
            }
        }
    }
</script>
