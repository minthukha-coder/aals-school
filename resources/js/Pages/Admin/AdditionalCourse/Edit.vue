<template>
    <Layout>
        <h4 class="text-center">Edit Additional Page</h4>

        <div class="container d-flex justify-center items-center">
            <div class="col-md-6">
                <v-row>
                    <v-col cols="12">
                        <v-textarea v-model="form.title" rows="1" label="Title" variant="outlined"></v-textarea>
                    </v-col>

                    <v-col cols="12">
                        <v-textarea v-model="form.duration" rows="1" label="Duration" variant="outlined"></v-textarea>
                    </v-col>

                    <v-col cols="12">
                        <v-file-input chips prepend-icon="mdi-camera" @change="onFileChange"
                            @input="form.image = $event.target.files[0]" variant="outlined" label="File" show-size
                            clearable @click:clear="clearImage"></v-file-input>
                        <div class="preview flex justify-center position-relative">
                            <v-img class="rounded-lg mb-4" :width="1" :height="300" cover v-if="formImageUrl"
                                :src="formImageUrl" />
                            <v-img class="rounded-lg mb-4" :width="1" :height="300" cover v-else-if="form.image"
                                :src="form.image" />
                            <div v-if="form.image" style="position:absolute;top:10px;right:10px">
                                <button @click="clearImage">
                                    <font-awesome-icon icon="fa-solid fa-circle-xmark" class="text-white fs-2" />
                                </button>
                            </div>
                        </div>
                    </v-col>

                </v-row>
                <button @click="submit" class="btn btn-success my-2 float-end">Update</button>

            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '@/Pages/Admin/Layouts/Layout.vue'
import { useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import { update} from '../../Composables/httpMethod.js';
const props = defineProps({
    course: Object,
});
const formImageUrl = ref(null);
const onFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        formImageUrl.value = URL.createObjectURL(file);
    }
};

const form = useForm({
    title: props.course?.title || '',
    duration : props.course?.duration || '',
    image: props.course?.image
});

const clearImage = () => {
    formImageUrl.value = null;
    form.name = null;
};

const submit = () => {
    update(form,route('admin.additional-courses.update', {id : props.course.id}));
}
</script>

<style scoped>
.preview {
    width: 100%;
    height: 300px;
}
</style>
