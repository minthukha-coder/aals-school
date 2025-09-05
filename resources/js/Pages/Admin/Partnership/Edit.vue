<template>
    <Layout>
        <h4 class="text-center">Edit Partnership</h4>
        <div class="container d-flex justify-center items-center">
            <div class="col-md-6">
                <v-row>
                    <v-col cols="12">
                        <v-textarea v-model="form.title" rows="1" label="Title" variant="outlined"></v-textarea>
                         <ErrorMessage :text="$page.props.errors.name" />
                    </v-col>

                    <v-col cols="12">
                        <v-textarea v-model="form.description" label="Description" variant="outlined"></v-textarea>
                         <ErrorMessage :text="$page.props.errors.description" />
                    </v-col>
                    <v-row>
                        <v-col cols="6">
                            <div class="preview flex justify-center relative">
                                <v-img class="rounded-lg mb-4 w-100" :height="300" cover v-if="formImageUrl_01"
                                    :src="formImageUrl_01" />

                                <v-img class="rounded-lg mb-4 w-100" :height="300" cover v-else-if="form.image1"
                                    :src="form.image1" />

                                <div class="absolute top-0 right-0">
                                    <button @click="clearFirstImage" class="fs-2">
                                        <font-awesome-icon icon="fa-solid fa-circle-xmark" />
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3 p-3">
                                <v-file-input @change="onFirstFileChange($event)"
                                    @input="form.image1 = $event.target.files[0]" label="Image Upload 1" chips
                                    prepend-icon="mdi-camera" variant="outlined" clearable
                                    @click:clear="clearImage"></v-file-input>
                            </div>
                        </v-col>

                        <v-col cols="6">
                            <div class="preview flex justify-center relative">
                                <v-img class="rounded-lg mb-4 w-100" :height="300" cover v-if="formImageUrl_02"
                                    :src="formImageUrl_02" />

                                <v-img class="rounded-lg mb-4 w-100" :height="300" cover v-else-if="form.image2"
                                    :src="form.image2" />

                                <div class="absolute top-0 right-0">
                                    <button @click="clearSecondImage" class="fs-2">
                                        <font-awesome-icon icon="fa-solid fa-circle-xmark" />
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3 p-3">
                                <v-file-input @change="onSecondFileChange($event)"
                                    @input="form.image2 = $event.target.files[0]" label="Image 2 Upload" chips
                                    prepend-icon="mdi-camera" variant="outlined" clearable
                                    @click:clear="clearSecondImage"></v-file-input>
                            </div>
                        </v-col>
                    </v-row>

                </v-row>
                <button @click="submit" class="btn btn-success my-2 float-end">Update</button>

            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '@/Pages/Admin/Layouts/Layout.vue'
import ErrorMessage from '../Components/ErrorMessage.vue';
import { useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import { update } from '../../Composables/httpMethod';
const props = defineProps({
    partnership: Object,
});
const formImageUrl_01 = ref(null);
const formImageUrl_02 = ref(null);


const onFirstFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        formImageUrl_01.value = URL.createObjectURL(file);
    }
};

const clearFirstImage = () => {
    formImageUrl_01.value = null;
    form.image1 = null;
};

const clearSecondImage = () => {
    formImageUrl_02.value = null;
    form.image2 = null;
};


const onSecondFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        formImageUrl_02.value = URL.createObjectURL(file);
    }
};



const form = useForm({
    title: props.partnership.title || '',
    description: props.partnership.description || '',
    image1: props.partnership.image1 || null,
    image2: props.partnership.image2 || null,
});

const clearImage = () => {
    formImageUrl.value = null;
    form.name = null;
};

const submit = () => {
    update(form, route('admin.partnerships.update', { id: props.partnership.id }));
}
</script>

<style scoped>
.preview {
    width: 100%;
    height: 300px;
}
</style>
