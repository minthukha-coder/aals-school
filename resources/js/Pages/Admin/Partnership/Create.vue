<template>
    <Layout>
        <h4 class="text-center">Partnership Course</h4>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 flex flex-col justify-center mx-auto">
                <div>
                    <v-textarea v-model="form.title" rows="1" label="Title" variant="outlined"></v-textarea>
                </div>

                <div>
                    <v-textarea v-model="form.description" label="Description" variant="outlined"></v-textarea>
                </div>

                <v-row>
                    <v-col cols="6">
                        <div class="preview flex justify-center relative" v-if="formImageUrl">
                            <v-img class="rounded-lg mb-4 w-100" :height="300" cover v-if="formImageUrl"
                                :src="formImageUrl" />

                            <div class="absolute top-0 right-0">
                                <button @click="clearImage" class="fs-2">
                                    <font-awesome-icon icon="fa-solid fa-circle-xmark" />
                                </button>
                            </div>
                        </div>

                        <div class="mb-3 p-3">
                            <v-file-input @change="onFileChange($event)" @input="form.image1 = $event.target.files[0]"
                                label="Image Upload 1" chips prepend-icon="mdi-camera" variant="outlined" clearable
                                @click:clear="clearImage"></v-file-input>
                        </div>
                    </v-col>

                    <v-col cols="6">
                        <div class="preview flex justify-center relative" v-if="formImageUrl_1">
                            <v-img class="rounded-lg mb-4 w-100" :height="300" cover v-if="formImageUrl_1"
                                :src="formImageUrl_1" />

                            <div class="absolute top-0 right-0">
                                <button @click="clearImage" class="fs-2">
                                    <font-awesome-icon icon="fa-solid fa-circle-xmark" />
                                </button>
                            </div>
                        </div>

                        <div class="mb-3 p-3">
                            <v-file-input @change="onFileChange($event)" @input="form.image2 = $event.target.files[0]"
                                label="Image 2 Upload" chips prepend-icon="mdi-camera" variant="outlined" clearable
                                @click:clear="clearImage"></v-file-input>
                        </div>
                    </v-col>
                </v-row>

                <button @click="submit" class="btn btn-success my-2">
                    Submit
                </button>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/Pages/Admin/Layouts/Layout.vue";
import { useForm } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
const props = defineProps({
    aboutImage: Object,
});
const formImageUrl_1 = ref(null);
const formImageUrl_2 = ref(null);

const onFirstFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        formImageUrl_1.value = URL.createObjectURL(file);
    }
};


const form = useForm({
    title: "",
    description: "",
    image1: "",
    image2: "",
});

const clearFirstImage = () => {
    formImageUrl_1.value = null;
    form.image1 = null;
};

const submit = () => {
    form.post(route("admin.courses.store"), {
        onSuccess: () => {
            formImageUrl_1.value = null;
            formImageUrl_2.value = null;
        },
        onError: (errors) => {
            console.error(errors);
        },
    });
};
</script>

<style scoped>
.preview {
    width: 100%;
    height: 300px;
}
</style>
