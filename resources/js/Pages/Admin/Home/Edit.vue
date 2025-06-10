<template>
    <Layout>
        <h4 class="text-center">Edit Home Image</h4>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 flex flex-col justify-center border mx-auto">
                <div class="preview flex justify-center relative" v-if="formImageUrl">
                    <v-img class="rounded-lg mb-4 w-100" :height="300" cover v-if="formImageUrl" :src="formImageUrl" />

                    <div class="absolute top-0 right-0">
                        <button @click="clearImage" class="fs-2"><font-awesome-icon
                                icon="fa-solid fa-circle-xmark" /></button>
                    </div>

                </div>


                <div class="mb-3 p-3">
                    <v-file-input @change="onFileChange($event)" @input="form.image = $event.target.files[0]"
                        label="Image Upload" chips prepend-icon="mdi-camera" variant="outlined" clearable
                        @click:clear="clearImage"></v-file-input>
                </div>

                <button @click="submit" class="btn btn-success my-2">Submit</button>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '@/Pages/Admin/Layouts/Layout.vue'
import { useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import {useToast} from 'vue-toastification';
const props = defineProps({
    homeImage: Object,
});

const toast = useToast();
const formImageUrl = ref(null);
const onFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        formImageUrl.value = URL.createObjectURL(file);
    }
};

onMounted(() => {
    if (props.homeImage && props.homeImage.name) {
        formImageUrl.value = props.homeImage.name;
    }
});

const form = useForm({
    image: props.homeImage ? props.homeImage.name : null,
});

const clearImage = () => {
    formImageUrl.value = null;
    form.name = null;
};

const submit = () => {
    form.post(route('admin.home.update'), {
        onSuccess: () => {
            formImageUrl.value = null;
            toast.success('Home image updated successfully!');	
        },
        onError: (errors) => {
            console.error(errors);
        },
    });
}
</script>

<style scoped>
.preview {
    width: 100%;
    height: 300px;
}
</style>