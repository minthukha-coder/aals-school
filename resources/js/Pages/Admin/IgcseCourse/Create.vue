<template>
    <Layout>
        <h4 class="text-center">Create IGCSE Course</h4>
        <div class="row mt-3">
            <div class="col-sm-12 col-md-8 col-lg-6 flex flex-col justify-center mx-auto">

                <v-row>
                    <v-text-field v-model="form.title" label="Course Title" variant="outlined"
                        :error="!!$page.props.errors.title" :error-messages="$page.props.errors.title" />
                </v-row>

                <v-row class="mt-4">
                    <v-text-field v-model="form.duration" label="Duration (e.g. 18 months)" variant="outlined"
                        :error="!!$page.props.errors.duration" :error-messages="$page.props.errors.duration" />
                </v-row>

                <v-row class="mt-4">
                    <v-text-field v-model="form.price_monthly" label="Price Monthly (Ks)" variant="outlined"
                        :error="!!$page.props.errors.price_monthly"
                        :error-messages="$page.props.errors.price_monthly" />
                </v-row>

                <v-row class="preview flex justify-center relative mt-6" v-if="formImageUrl">
                    <v-img class="rounded-lg mb-4 w-100" :height="200" cover :src="formImageUrl" />
                    <div class="absolute top-0 right-0">
                        <button @click="clearImage" class="fs-2"><font-awesome-icon
                                icon="fa-solid fa-circle-xmark" /></button>
                    </div>
                </v-row>

                <div class="mb-3 p-3">
                    <v-file-input @change="onFileChange($event)" @input="form.image = $event.target.files[0]"
                        label="Course Image Upload" chips prepend-icon="mdi-camera" variant="outlined" clearable
                        @click:clear="clearImage" />
                </div>
            </div>

            <h5 class="text-center mt-6">Subjects</h5>
            <button class="btn btn-primary my-2" @click="addSubject">+ Add Subject</button>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-3">

                <div v-for="(subject, index) in form.subjects" :key="index" class="p-3 border rounded">
                    <v-text-field v-model="subject.title" label="Subject Title" variant="outlined" />

                    <v-file-input @change="onSubjectImageChange($event, index)" label="Subject Image" chips
                        prepend-icon="mdi-image" variant="outlined" clearable />

                    <v-img v-if="subject.preview" :src="subject.preview" :height="120" class="rounded mt-2" />

                    <button class="btn btn-danger btn-sm mt-2" @click="removeSubject(index)">
                        Remove Subject
                    </button>
                </div>
            </div>

            <!-- Submit -->
            <button @click="submit" class="btn btn-success my-3 w-100">Submit Course</button>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '@/Pages/Admin/Layouts/Layout.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import { useToast } from 'vue-toastification'
import { post } from '../../Composables/httpMethod.js'

const toast = useToast();
const formImageUrl = ref(null);

const form = useForm({
    title: '',
    duration: '',
    price_monthly: '',
    image: '',
    subjects: []
});

const onFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        formImageUrl.value = URL.createObjectURL(file);
        form.image = file;
    }
};

const clearImage = () => {
    formImageUrl.value = null;
    form.image = null;
};

// Subjects
const addSubject = () => {
    form.subjects.push({ title: '', image: null, preview: null });
};

const removeSubject = (index) => {
    form.subjects.splice(index, 1);
};

const onSubjectImageChange = (event, index) => {
    const file = event.target.files[0];
    if (file) {
        form.subjects[index].image = file;
        form.subjects[index].preview = URL.createObjectURL(file);
    }
};

const submit = () => {
    post(form, route('admin.igcse-courses.store'));
};
</script>
