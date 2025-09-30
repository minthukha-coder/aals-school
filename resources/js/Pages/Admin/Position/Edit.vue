<template>
    <Layout>
        <h4 class="text-center">Update Position</h4>
        <div class="row mt-3">
            <div class="col-sm-12 col-md-6 col-lg-6 flex flex-col justify-center mx-auto">
                <v-row>
                    <v-textarea v-model="form.name" rows="1" label="Name" variant="outlined"
                        :error="!!$page.props.errors.name" :error-messages="$page.props.errors.name"></v-textarea>
                </v-row>

                <v-row class="mt-3">
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
                    <div>
                        <div class="fw-bold fs-5 mb-9">Benefits</div>

                        <div class="border-2 border-danger p-2 flex justify-center my-3 text-danger"
                            @click="addInputBox" style="cursor: pointer;">
                            <font-awesome-icon class="mt-1 me-1" icon="fa-solid fa-plus" />
                            Add Benefit
                        </div>

                        <v-row v-for="(box, index) in form.benefits" :key="index" class="my-2">
                            <v-col cols="11">
                                <v-textarea rows="1" v-model="box.benefit" variant="outlined" label="Benefit"
                                    hide-details required />
                            </v-col>

                            <v-col cols="1">
                                <button @click="removeInputBox(index)" class="btn btn-success">
                                    <font-awesome-icon icon="fa-solid fa-xmark" />
                                </button>
                            </v-col>
                        </v-row>
                    </div>
                </v-row>



                <button @click="updatePosition" class="btn btn-success my-2">Update</button>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '@/Pages/Admin/Layouts/Layout.vue'
import ErrorMessage from '../Components/ErrorMessage.vue';
import { useForm } from '@inertiajs/vue3';

import { update } from '../../Composables/httpMethod';

const props = defineProps({
    position: Object,
})
const form = useForm({
    name: props.position?.name || '',
    salary: props.position?.salary || '',
    date: props.position?.date || '',
    place: props.position?.place || '',
    responsibilities: props.position?.responsibilities || '',
    requirements: props.position?.requirements,
    highlight: props.position?.highlight || '',
    benefits: props.position.benefits.map(b => ({ benefit: b.benefit }))
});

function addInputBox() {
    form.benefits.push({ benefit: "" });
}

function removeInputBox(index) {
    form.benefits.splice(index, 1);
}


const updatePosition = () => {
    update(form, route("admin.positions.update", { id: props.position.id }));
}
</script>

<style scoped>
.preview {
    width: 100%;
    height: 300px;
}
</style>
