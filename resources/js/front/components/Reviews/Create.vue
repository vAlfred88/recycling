<template>
    <form class="leave-comment shadow-element" @submit.prevent="onSubmit">
        <textarea class="leave-comment__textatea textarea"
                  v-model="body"
                  data-vv-name="комментарий"
                  v-validate="rules.body"
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
            <input type="submit"
                   value="Отправить">
        </div>
        <login-modal :login-url="loginUrl" :register-url="registerUrl"></login-modal>
        <info-modal>
            Отзыв можно оставить только один раз в сутки
        </info-modal>
    </form>
</template>

<script>
    export default {
        name: "NewReview",
        props: ['companyId', 'auth', 'loginUrl', 'registerUrl'],
        data() {
            return {
                body: '',
                review: true,
                rules: {
                    body: {
                        required: true,
                        min: 6
                    }
                }
            }
        },
        computed: {
            reviews() {
                return this.$store.getters.reviews;
            }
        },
        methods: {
            onSubmit() {
                if (!!this.auth) {
                    let user_reviews = this.reviews.filter(review => {
                        if (review.user_id == this.auth) {
                            if (moment(review.created_at) >= moment().startOf('day') || moment(review.created_at) <= moment().endOf('day')) {
                                return true;
                            }
                        }

                        return false;
                    });
                    this.$validator.validate().then(result => {
                        if (result) {
                            if (!user_reviews.length) {
                                axios.post('/recycles/' + this.companyId + '/reviews', {
                                    body: this.body,
                                    review: this.review
                                })
                                    .then(response => {
                                        this.body = '';
                                        this.$store.commit('pushReviews', response.data);
                                    })
                                    .catch(error => {
                                        console.log(error)
                                    });
                            }
                            this.$modal.show('info');
                        }
                    });
                } else {
                    this.$modal.show('login');
                }
            }
        }
    }
</script>

<style scoped>
    textarea:invalid {
        border-color: red;
    }

    input[type=submit] {
        box-sizing: border-box;
        padding: 7px 15px;
        color: #fff;
        border-radius: 18px;
        background: #8D9498;
        cursor: pointer;
        transition: opasity .3s;
        margin-left: 26px;
        width: 115px;
        font-size: 16px;
    }
</style>
