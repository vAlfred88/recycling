<template>
    <div class="people_slider alCenter fright">
        <!--        <button class="slick-prev slick-arrow"-->
        <!--                v-if="users.length > 3"-->
        <!--                @click="prev"-->
        <!--                type="button">-->
        <!--            Previous-->
        <!--        </button>-->
        <!--        <div class="slick-list">-->
        <!--            <div class="slick-track">-->
        <slick ref="users" :options="slickOptions">
            <div class="item slick-slide" style="width: 215px" v-for="user in users" :key="user.id">
                <div class="block">
                    <div class="image_block m0a cover brd50"
                         :style="{ backgroundImage: `url('${user.image}')` }"></div>
                    <div class="ah1 sbold">{{ user.name }}</div>
                    <div class="ah2">{{ user.position }}</div>
                    <a class="inb vT nowrap" :href="`mailto:${user.email}`"
                       :title="user.email">{{ user.email }}</a>
                    <a class="inb vT nowrap"
                       :href="`tel:${user.phone}`">{{ user.phone }}</a>
                    <a :href="`mailto:${user.email}`" class="email sb abs brd50">
                        <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5489 13.7965H2.45105C1.65123 13.7965 1 13.1459 1 12.3455V2.45105C1 1.65065 1.65123 1 2.45105 1H17.5489C18.3488 1 19 1.65065 19 2.45105V12.3455C19 13.1459 18.3488 13.7965 17.5489 13.7965ZM2.45105 1.58042C1.97104 1.58042 1.58042 1.97104 1.58042 2.45105V12.3455C1.58042 12.8255 1.97104 13.2161 2.45105 13.2161H17.5489C18.029 13.2161 18.4196 12.8255 18.4196 12.3455V2.45105C18.4196 1.97104 18.029 1.58042 17.5489 1.58042H2.45105Z"
                                fill="#F49135"
                                stroke="#F49135"
                                stroke-width="0.3">
                            </path>
                            <path
                                d="M10 8.85643C9.61406 8.85643 9.22808 8.72816 8.93439 8.47219L1.51719 2.00805C1.39647 1.90241 1.3837 1.71958 1.48933 1.59885C1.59497 1.47696 1.77838 1.46536 1.89911 1.57041L9.31572 8.03455C9.68719 8.35785 10.314 8.35727 10.6844 8.03455L18.0992 1.57099C18.2194 1.46478 18.4022 1.47696 18.509 1.59943C18.6146 1.72016 18.6019 1.90299 18.4811 2.00863L11.0657 8.47161C10.772 8.72816 10.386 8.85643 10 8.85643Z"
                                fill="#F49135"
                                stroke="#F49135"
                                stroke-width="0.3">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </slick>
        <!--            </div>-->
        <!--        </div>-->
        <!--        <button class="slick-next slick-arrow"-->
        <!--                v-if="users.length > 3"-->
        <!--                @click="next"-->
        <!--                type="button">-->
        <!--            Next-->
        <!--        </button>-->
    </div>
</template>

<script>
    export default {
        name: "UserSlick",
        props: {
            users: {
                type: Array,
                required: true
            }
        },
        data() {
            return {
                slickOptions: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: false,
                    infinite: true,
                    fade: false,
                    responsive: [
                        {
                            breakpoint: 1250,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 1000,
                            settings: {
                                slidesToShow: 1
                            }
                        },
                        {
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 625,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                }
            }
        },
        computed: {
            sss() {
                let slides = 3;

                if (this.users.length < 3) {
                    slides = this.users.length;
                }

                return {
                    dots: false,
                    arrows: true,
                    slidesToShow: slides,
                }
            }
        },
        methods: {
            next() {
                this.$refs.users.next();
            },

            prev() {
                this.$refs.users.prev();
            },

        }
    }
</script>

<style scoped>
    .item-block {
        display: flex;
    }

    .slick-slide, slick-track {
        width: 215px;
    }
</style>
