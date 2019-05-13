<template>
    <div class="comments-box shadow-element">
        <div class="comments-box__header clearfix">
            <span class="db address fleft">{{ company.address }}</span>
            <div class="comments-indicator-box fright">
                <span class="positive-comments"><span class="positive">{{ reviews | positive }} </span>Положительный</span>
                <span class="negative-comments"><span class="negative">{{ reviews | negative }} </span>Отрицательный</span>
            </div>
            <div class="clear"></div>
        </div>
        <div>
            <transition-group name="reviews" tag="div">
                <div class="comments-item" v-for="review in reviews" :key="review.id">
                    <div class="comments-item__header clearfix">
                        <span class="comments-item__header__avatar db"></span>
                        <span class="comments-item__header__name rL hid db">
                                {{ review.username }}
                            </span>
                        <span class="comments-item__header__date rL hid db">
                                {{ review.created_at }}
                            </span>
                    </div>
                    <div class="comments-item__comment" :class="bodyClass(review)">
                        <p>{{ review.body }}</p>
                    </div>
                </div>
            </transition-group>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ReviewsList",
        props: ['company'],
        computed: {
            reviews() {
                return this.$store.getters.reviews;
            },
        },
        filters: {
            positive(payload) {
                if (!payload) {
                    return 0;
                }
                return payload.filter(comment => {
                    return comment.review;
                }).length;
            },
            negative(payload) {
                if (!payload) {
                    return  0;
                }
                return payload.filter(comment => {
                    return !comment.review;
                }).length
            },
        },
        async created() {
            await this.$store.dispatch('loadReviews', this.company.id);
        },
        methods: {
            bodyClass(comment) {
                return comment.review ? 'comments-item__comment_positive' : 'comments-item__comment_negative'
            },
        }
    }
</script>

<style scoped>
    .reviews-enter-active, .reviews-leave-active {
        transition: all 1s;
    }
    .reviews-enter, .reviews-leave-to{
        opacity: 0;
        transform: translateY(30px);
    }
    .reviews-move {
        transition: transform 1s;
    }
</style>
