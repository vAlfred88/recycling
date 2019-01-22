<template>
    <div class="flex-row" v-show="isFileLoaded">
        <div class="preview">
            <img :src="image" alt="avatar" class="upload-preview rounded mx-auto d-block" ref="upload">
            </div>
        </div>
</template>

<script>
    export default {
        name: 'Cropper',
        data() {
            return {
                cropper: null,
                isFileLoaded: false,
                image: null,
                file: {
                    name: null
                },
                aspect: 1,
            }
        },
        mounted() {
            this.initCropper();
        },
        methods: {
            initCropper() {
                let el = this.$refs.upload;

                this.cropper = new Cropper(el, {
                    viewMode: 1,
                    aspectRatio: this.aspect,
                    cropBoxResizable: true,
                    responsive: true
                })
            },
            destroyCropper() {
                this.cropper.destroy();
                this.cropper = null;
                this.image = null;
            },
            showUploadPreview() {
                this.isFileLoaded = true
            },
            onFileLoad() {
                this.file = this.$refs.file.files[0];

                this.showUploadPreview();

                let reader = new FileReader();

                this.$nextTick(() => {
                    this.destroyCropper();
                    this.initCropper();

                    reader.addEventListener('load', () => {
                        this.image = reader.result;
                        this.cropper.replace(reader.result)
                    });

                    reader.readAsDataURL(this.file)
                })
            },
            onCrop() {
                this.$refs.file.files[0] = this.cropper.getCroppedCanvas().toDataURL();
                this.isFileLoaded = false
            }
        }
    }
</script>

<style scoped>
    @import "~cropperjs/dist/cropper.css";

    /* This rule is very important, please do not ignore this! */
    img {
        max-width: 100%;
    }

    .preview {
        padding: 10px 0;
    }
</style>