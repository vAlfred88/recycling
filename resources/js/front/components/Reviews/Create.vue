<template>
    <form class="leave-comment shadow-element">
        <textarea class="leave-comment__textatea textarea"
                  v-model="body"
                  placeholder="Оставить отзыв..."></textarea>
        <div class="leave-comment__btn-box">
            <label class="positive-radio">
                <input type="radio"
                       name="comment-radio"
                       v-model="review"
                       :value="true">
                <span></span>
            </label>
            <label class="negative-radio">
                <input type="radio"
                       name="comment-radio"
                       v-model="review"
                       :value="false">
                <span></span>
            </label>
            <!-- Когда пользователь не зарегистрирован, то у нижеприведенного input присутствует класс user-not-registered, по которому вызывается модальное окно -->
            <input type="button"
                   value="Отправить"
                   @click.prevent="onSubmit"
                   class="user-not-registered">
        </div>
    </form>
</template>

<script>
    export default {
        name: "NewReview",
        props: ['companyId'],
        data() {
            return {
                body: '',
                review: true
            }
        },
        methods: {
            onSubmit() {
                axios.post('/recycles/' + this.companyId + '/reviews', {body: this.body, review: this.review})
                    .then(response => {
                        this.body = '';
                        this.$store.commit('pushReviews', response.data);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
