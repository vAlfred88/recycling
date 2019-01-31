<template>
    <modal classes="bg-white shadow-lg"
           height="auto"
           name="info"
           @closed="onCancel"
           transition="pop-out">
        <slot name="header"></slot>
        <div class="flex">
            <slot></slot>
        </div>
        <div class="flex my-10">
            <div class="mx-auto">
                <button @click="onCancel"
                        class="flex-1 bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded w-auto">
                    Закрыть
                </button>
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