<template>
    <Layout>
        <h4 class="text-center">Create Position</h4>
        <div class="row mt-3">
            <div class="col-sm-12 col-md-6 col-lg-6 flex flex-col justify-center mx-auto">
                <v-row>
                    <v-col cols="12">
                    <v-textarea v-model="form.name" rows="1" label="Name" variant="outlined" />
                    <ErrorMessage :text="$page.props.errors.name" />
                    </v-col>
                </v-row>

                <v-row>
                    <v-textarea v-model="form.salary" rows="1" label="Salary" variant="outlined"></v-textarea>
                </v-row>

                <v-row>
                    <v-textarea v-model="form.date" rows="1" label="Date" variant="outlined"></v-textarea>
                </v-row>

                <v-row>
                    <v-textarea v-model="form.place" rows="1" label="Place" variant="outlined"></v-textarea>
                </v-row>

                <v-row>
                    <v-textarea v-model="form.responsibilities" rows="1" label="Responsibilities"
                        variant="outlined"></v-textarea>
                </v-row>

                <v-row>
                    <v-textarea v-model="form.requirements" rows="1" label="Requirements"
                        variant="outlined"></v-textarea>
                </v-row>

                <v-row>
                    <v-textarea v-model="form.highlight" rows="1" label="HighLight" variant="outlined"></v-textarea>
                </v-row>

                <v-row>
                    <v-textarea v-model="form.benefits" rows="1" label="Benefits" variant="outlined"></v-textarea>
                </v-row>


                <button @click="submit" class="btn btn-success my-2">Submit</button>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '@/Pages/Admin/Layouts/Layout.vue'
import ErrorMessage from '../Components/ErrorMessage.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useToast } from 'vue-toastification';
import { post } from '../../Composables/httpMethod';
const toast = useToast();


const form = useForm({
    name: '',
    salary: '',
    date: '',
    place: '',
    responsibilities: '',
    requirements: '',
    highlight: '',
    benefits: '',
});


const submit = () => {
    console.log(form)
    post(form, route("admin.positions.store"));
}
</script>

<style scoped>
.preview {
    width: 100%;
    height: 300px;
}
</style>
