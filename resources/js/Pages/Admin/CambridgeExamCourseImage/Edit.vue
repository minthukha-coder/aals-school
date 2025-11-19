<template>
    <Layout>
        <h4 class="text-center">Edit Cambridge Exam Course Cover</h4>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 flex flex-col justify-center border mx-auto">
                <div class="preview flex justify-center relative" v-if="formImageUrl">
                    <v-img class="rounded-lg mb-4 w-100" :height="300" cover :src="formImageUrl" />

                    <div class="absolute top-0 right-0">
                        <button @click="clearImage" class="fs-2">
                            <font-awesome-icon icon="fa-solid fa-circle-xmark" />
                        </button>
                    </div>
                </div>

                <div class="mb-3 p-3">
                    <v-file-input
                        @change="onFileChange"
                        label="Image Upload"
                        chips
                        prepend-icon="mdi-camera"
                        variant="outlined"
                        clearable
                        @click:clear="clearImage"
                    />
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
import { useToast } from 'vue-toastification';

const props = defineProps({
    cambridgeExamCourseImage: Object,
});

const toast = useToast();
const formImageUrl = ref(null);
const form = useForm({
    image: null,
});

const onFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.image = file;
        formImageUrl.value = URL.createObjectURL(file);
    }
};

onMounted(() => {
    if (props.cambridgeExamCourseImage && props.cambridgeExamCourseImage.name) {
        formImageUrl.value = props.cambridgeExamCourseImage.name;
    }
});

const clearImage = () => {
    formImageUrl.value = null;
    form.image = null;
};

const submit = () => {
    form.post(route('admin.cambridge-exam-course-images.update'), {
        forceFormData: true,
        onSuccess: () => {
            formImageUrl.value = null;
            toast.success('Cambridge Exam Course Cover updated successfully!');
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
