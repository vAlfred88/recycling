<template>
    <div class="tbc left-cell">
        <div class="select-box">
            <div class="nice-select region opens">
                <span class="current" @click="isShown = !isShown">{{ city }}</span>
                <ul class="list" v-show="isShown">
                    <li class="option"
                        v-for="item in cities"
                        @click="onCitySelect(item)"
                        :key="item">{{ item }}
                    </li>
                </ul>
            </div>
        </div>
        <label class="checkbox-btn db all-reviews">
            <input type="checkbox"
                   name="all"
                   @change="onSelectAll"
                   v-model="selectedAll">
            <span>Все отзывы</span>
        </label>
        <span class="cuption db">Офис</span>
        <label class="checkbox-btn db office">
            <input type="checkbox"
                   v-model="selectedCompany"
                   name="company"
                   @change="onCompanySelect">
            <span>{{ company.address }}</span>
        </label>

        <span class="cuption db">Пункты приема</span>
        <label class="checkbox-btn db reception-point" v-for="reception in receptions">
            <input type="checkbox"
                   name="receptions"
                   v-model="selectedReceptions"
                   :value="reception.id"
                   @change="onReceptionSelect">
            <span>{{ reception.address }}</span>
        </label>
    </div>
</template>

<script>
    export default {
        name: "ReviewFilter",
        props: {
            company: {
                required: true,
                type: Object,
            }
        },
        data() {
            return {
                isShown: false,
                selectedReceptions: [],
                selectedCompany: true,
                selectedAll: false
            }
        },
        computed: {
            cities() {
                return this.$store.getters.cities;
            },
            receptions() {
                return this.$store.getters.receptions;
            },
            city() {
                return this.$store.getters.city;
            }
        },
        async created() {
            await this.$store.dispatch('loadCompanyCities', this.company.id);
            await this.$store.dispatch('loadReceptions', {
                company_id: this.company.id
            });
        },
        methods: {
            async onCitySelect(city) {
                this.$store.commit('setCity', city);
                this.isShown = false;
                await this.$store.dispatch('loadReceptions', {
                    company_id: this.company.id,
                    city: city
                });
            },
            async onReceptionSelect() {
                this.selectedAll = false;
                this.selectedCompany = false;
                await this.$store.dispatch('filterReview', this.selectedReceptions);
            },
            async onCompanySelect() {
                this.selectedReceptions = [];
                this.selectedAll = false;
                await this.$store.dispatch('loadReviews', this.company.id)
            },
            async onSelectAll() {
                this.selectedCompany = false;
                this.selectedReceptions = [];
                await this.$store.dispatch('loadAllReviews', this.company.id)
            }
        }
    }
</script>

<style scoped>

</style>
