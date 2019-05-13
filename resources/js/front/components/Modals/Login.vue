<template>
    <modal name="login"
           transition="pop-out"
           @closed="onCancel"
           width="400px"
           height="auto">
        <div class="b-modal" id="w-modal">
            <div class="warning-modal">
                <div class="b-modal_close arcticmodal-close" @click="onCancel"></div>
                <span class="warning-modal__message_top">
                        Что-бы отставить отзыв, вы должны быть аторизованным!
                    </span>
                <div class="warning-modal__btn-box clearfix">
                    <a class="reg-btn reg-btn_bg shadow-element fleft" :href="loginUrl">Войти</a>
                    <a class="reg-btn reg-btn_no-bg shadow-element fright" :href="registerUrl">Регистрация</a>
                </div>
            </div>
        </div>
    </modal>
</template>

<script>
    export default {
        name: "LoginModal",
        props: ['loginUrl', 'registerUrl'],
        methods: {
            onCancel() {
                this.$modal.hide('login');
            }
        }
    }
</script>

<style scoped>

</style>
