<template>
    <section>
        <div class="col-md-8 col-md-offset-2">
            <div class="fileinput fileinput-new input-group">
                <div class="form-control">
                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                    <span>{{ file.name }}</span>
                </div>
                <span class="input-group-addon btn btn-default btn-file">
                <span class="fileinput-new" v-show="!isFileLoaded">Выберите файл</span>
                <span @click="onCrop" class="fileinput-new" v-show="isFileLoaded">Готово</span>
                <input @change="onFileLoad" name="file" ref="file" type="file" v-show="!isFileLoaded">
            </span>
                <a class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"
                   href="#">Remove</a>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="col-4" v-show="isFileLoaded">
                <div class="preview">
                    <img :src="image" alt="avatar" class="upload-preview rounded mx-auto d-block" ref="upload">
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'Cropper',
        props: {
            width: {
                type: Number,
                required: true
            },
            height: {
                type: Number,
                required: true
            },
        },
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