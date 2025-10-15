<template>

    <Head title="Career - Aung Academy Language School" />

    <Layout>
        <section class="vh-20" id="foundation-course">
            <div class="hidden md:block">
                <img src="../User/images/career.jpg" alt="" class="w-full object-fit-cover" />
            </div>
            <div class="absolute left-30 top-40 md:left-20 md:top-70 text-white p-2">
                <div>
                    <h4 class="font-bold" style="font-size:50px;">Career Opportunies</h4>
                </div>
                <h3 class="text-white">Join Us</h3>
                
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
                                <p><strong>Salary:</strong> {{ position.salary ?? '-' }}</p>
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
                                <input v-model="form.name" type="text" placeholder="Enter your name"
                                    class="w-full p-2 mb-4 border border-gray-300 rounded-lg focus:outline-none" />
                                <input v-model="form.email" type="text" placeholder="Email"
                                    class="w-full p-2 mb-4 border border-gray-300 rounded-lg focus:outline-none">
                                <div class="flex items-center mb-4">
                                    <span class="p-2 border rounded-l-lg bg-gray-100">+95</span>
                                    <input v-model="form.phone" type="text" placeholder="Phone"
                                        class="w-full p-2 border border-l-0 rounded-r-lg focus:outline-none">
                                </div>
                                <textarea v-model="form.user_message" placeholder="Message"
                                    class="w-full p-2 mb-4 border border-gray-300 rounded-lg focus:outline-none"></textarea>
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
