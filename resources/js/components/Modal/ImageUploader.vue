<template>
    <modal classes="bg-white shadow-lg h-auto"
           height="auto"
           name="image-upload"
           transition="pop-out">
        <h4 class="px-6 text-center text-grey-darker mb-10">Фотография профиля</h4>
        <div class="flex" v-if="!isFileLoaded">
            <div :class="{ dragging: isDragging }"
                 @dragenter.prevent="onDragEnter"
                 @dragleave.prevent="onDragLeave"
                 @dragover.prevent
                 @drop.prevent.stop="onDrop"
                 class="w-1/2 mx-auto mb-10 border border-grey-light rounded draggable">
                <div class="text-center text-large">
                    <i class="fa fa-cloud-upload"></i>
                </div>
                <p class="text-center">Drag your images here</p>
                <p class="text-center">OR</p>
                <label class="cursor-pointer text-center text-3xl hover:text-orange-light" for="file">
                    <i class="fa fa-download text-base"></i>
                    Select a file
                    <input @change="onInputChange" class="opacity-0"
                           id="file" type="file">
                </label>
                <cropper></cropper>
            </div>
        </div>
        <div class="mb-10" v-if="isFileLoaded">
            <div class="flex">
                <div class="w-2/3 mx-10">
                    <img alt="default.png"
                         class="block w-2/3 m-5"
                         ref="upload"
                         src="/images/default.png">
                </div>
                <div class="w-1/3 mx-10">
                    <div class="flex-col">
                        <div class="preview flex-1 my-5 rounded-full overflow-hidden"></div>
                        <div class="preview flex-1 my-5 overflow-hidden"></div>
                    </div>
                </div>
            </div>
            <div class="flex my-10">
                <button @click="onCancel"
                        class="flex-1 ml-32 mr-4 bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded">
                    Отменить
                </button>
                <button class="flex-1 mr-32 ml-4 bg-orange hover:bg-orange-dark text-white font-bold py-2 px-4 rounded"
                        type="submit">
                    Upload
                </button>
            </div>
        </div>
    </modal>
</template>

<script>
    export default {
        name: "ImageUploader",
        data() {
            return {
                isDragging: false,
                dragCount: 0,
                cropper: null,
                isFileLoaded: false,
                image: null,
                file: {
                    name: null
                },
                aspect: 1,
            }
        },
        computed: {
            croppedImage() {
                // console.log(this.image);
                if (this.cropper) {
                    return this.image = this.cropper.toDataURL();
                }
            }
        },
        methods: {
            onDragEnter() {
                this.dragCount++;
                this.isDragging = true;
            },
            //onclose event
            onDragLeave() {
                this.dragCount--;
                if (this.dragCount <= 0)
                    this.isDragging = false;
            },
            onInputChange(e) {
                this.isFileLoaded = true;
                this.isDragging = false;

                this.file = e.target.files[0];

                this.onFileLoad()
            },
            onDrop(e) {
                e.stopPropagation();

                this.isFileLoaded = true;
                this.isDragging = false;

                this.file = e.dataTransfer.files[0];

                this.onFileLoad()
            },
            onCancel() {
                this.isFileLoaded = false
            },
            initCropper() {
                let el = this.$refs.upload;

                this.cropper = new Cropper(el, {
                    viewMode: 1,
                    aspectRatio: this.aspect,
                    cropBoxResizable: true,
                    preview: '.preview',
                    responsive: true,
                });
            },
            destroyCropper() {
                this.cropper.destroy();
                this.cropper = null;
                this.image = null;
            },
            onFileLoad() {
                let reader = new FileReader();

                this.$nextTick(() => {
                    this.initCropper();

                    reader.addEventListener('load', () => {
                        this.image = reader.result;
                        this.cropper.replace(reader.result)
                    });

                    reader.readAsDataURL(this.file)
                });
            },
            onCrop() {
                this.image = this.cropper.getCroppedCanvas();
            }
        }
    }
</script>

<style scoped>
    @import "~cropperjs/dist/cropper.css";

    .preview {
        width: 150px;
        height: 150px;
    }

    .text-large {
        font-size: 10rem;
    }
</style>