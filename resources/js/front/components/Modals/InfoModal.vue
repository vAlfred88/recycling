<template>
    <modal name="info"
           transition="pop-out"
           @closed="onCancel"
           width="400px"
           height="auto">
        <div class="b-modal" id="w-modal">
            <div class="warning-modal">
                <div class="b-modal_close arcticmodal-close" @click="onCancel"></div>
                <span class="warning-modal__message_top"><slot name="header"></slot></span>
                <div class="warning-modal__btn-box clearfix">
                    <slot></slot>
                </div>
            </div>
        </div>
    </modal>
</template>

<script>
    export default {
        name: "InfoModal",
        methods: {
            onCancel() {
                this.$modal.hide('info');
            }
        }
    }
</script>

<style scoped>

</style>
