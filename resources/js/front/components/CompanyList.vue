<template>
    <div>
        <div class="table-container shadow-element">
            <div class="table-overflow-x">
                <table class="company-table">
                    <tr>
                        <th><span>№</span></th>
                        <th><span>Компания</span></th>
                        <th><span>Активность</span></th>
                        <th><span>Отзывы</span></th>
                        <th><span>Пункты<br> приема</span></th>
                        <th><span>Охват<br> городов</span></th>
                        <th><span>Рейтинг</span></th>
                    </tr>
                    <transition-group name="table" tag="tbody">
                        <tr v-for="(company, key) in companies" :key="company.id">
                            <td>{{ key }}</td>
                            <td>
                                <a :href="company.route">
                                    <span class="text-box inb rL"><span
                                        class="company-name">{{ company.name }}</span><span class="company-location">{{ company.address }}</span><span
                                        class="company-logo abs" :style="logo(company)"></span></span>
                                </a>
                            </td>
                            <td>12.5</td>
                            <td>{{ company.positive_reviews }}<span class=“slash”> / </span><span class=“fraction” style="color: red">{{ company.negative_reviews }}</span></td>
                            <td>{{ company.receptions_count }}</td>
                            <td>3</td>
                            <td><span class="rating-growth">34.2</span></td>
                        </tr>
                    </transition-group>
                </table>
            </div>
        </div>
        <a class="btn" style="max-width: 245px" @click.prevent="pushCompanies" v-if="companyPaginate.next_page_url">Показать
            еще 25 компаний</a>
    </div>
</template>

<script>
    export default {
        name: "CompanyList",
        computed: {
            companies() {
                return this.$store.getters.companies;
            },
            companyPaginate() {
                return this.$store.getters.companyPaginate
            },
        },
        async created() {
            await this.$store.dispatch('loadCompanies');
        },
        methods: {
            async pushCompanies() {
                await this.$store.dispatch('pushCompanies', this.companyPaginate.next_page_url)
            },
            logo(company) {
                return {
                    'background-image': 'url(' + company.logo + ')',
                }
            }
        }
    }
</script>

<style scoped>
    .table-enter-active, .table-leave-active {
        transition: all 1s;
    }

    .table-enter, .table-leave-to {
        opacity: 0;
        transform: translateY(30px);
    }

    .table-move {
        transition: transform 1s;
    }
</style>
