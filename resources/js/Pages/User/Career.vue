<template>

    <Head title="Career - Aung Academy Language School" />

    <Layout>
        <section id="career" class="relative overflow-hidden">
            <div class="hidden md:block w-full h-full">
                <img src="../User/images/career.jpg" alt="Career Opportunities"
                    class="w-full h-full object-cover object-center">

            </div>
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="hidden md:block absolute left-30 top-40 text-white p-2">
                <h4 class="font-bold mx-20" style="font-size:70px;">Career Opportunities</h4>
            </div>
        </section>


        <section class="container py-10">
            <p class="text-2xl font-bold">Positions</p>
            <v-expansion-panels>
                <v-expansion-panel v-for="(position) in positions" :key="position.id">
                    <v-expansion-panel-title>
                        Class Teacher
                    </v-expansion-panel-title>
                    <v-expansion-panel-text>
                        <div class="d-md-flex justify-content-between row">
                            <!-- Position Details -->
                            <div class="col-md-7">
                                <p><strong>Position:</strong> {{ position.name }}</p>
                                <p><strong>Salary:</strong> {{ position.salary ? parseInt(position.salary) + ' MMK' :
                                    '-' }}</p>
                                <p><strong>Date:</strong> {{ position.date }}</p>
                                <p><strong>Place:</strong> {{ position.place }}</p>
                                <p><strong>Responsibilities:</strong> {{ position.responsibilities }}</p>
                                <p><strong>Requirements:</strong> {{ position.requirements }}</p>
                                <p><strong>Highlights:</strong> {{ position.highlight }}</p>
                                <p><strong>Benefits:</strong> </p>

                                <ul class="p-0 m-0">
                                    <li v-for="benefit in position.benefits" :key="benefit.id"> - {{ benefit.benefit }}
                                    </li>
                                </ul>

                            </div>
                            <!-- Application Form -->
                            <div class="border rounded p-3 flex-fill col-md-5">
                                <div class="mb-3">
                                    <input v-model="form.name" type="text" placeholder="Enter your name"
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none" />
                                    <ErrorMessage :text="form.errors.name" />

                                </div>

                                <div class="mb-3">
                                    <input v-model="form.email" type="text" placeholder="Email"
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none">
                                    <ErrorMessage :text="form.errors.email" />

                                </div>

                                <div class="mb-3">
                                    <div class="flex items-center ">
                                        <span class="p-2 border rounded-l-lg bg-gray-100">+95</span>
                                        <input v-model="form.phone" type="text" placeholder="Phone"
                                            class="w-full p-2 border border-l-0 rounded-r-lg focus:outline-none">
                                    </div>
                                    <ErrorMessage :text="form.errors.phone" />

                                </div>


                                <div class="mb-3">
                                    <textarea v-model="form.user_message" placeholder="Message"
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none"></textarea>
                                    <ErrorMessage :text="form.errors.user_message" />

                                </div>


                                <div class="d-flex justify-end">
                                    <v-btn color="primary" @click="applyForPosition(position.id)">
                                        Apply
                                    </v-btn>

                                </div>
                            </div>
                        </div>
                    </v-expansion-panel-text>
                </v-expansion-panel>
            </v-expansion-panels>
        </section>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import imageCard from "../User/Components/imageCard.vue";
import { useForm } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3'
import ErrorMessage from "../Admin/Components/ErrorMessage.vue";
const props = defineProps({
    positions: Array,
});

const form = useForm({
    name: '',
    email: '',
    phone: '',
    user_message: '',
    position_id: null,
})

const applyForPosition = (positionId) => {
    form.position_id = positionId;
    form.post(route('career.apply'));
};
</script>

<style lang="scss" scoped></style>
