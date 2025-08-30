<template>
    <Layout>
        <section class="vh-20" id="foundation-course">
            <div>
                <img src="../User/images/home.jpg" alt="" class="w-full object-cover" style="height: 300px" />
            </div>
            <div class="absolute left-30 top-40 md:left-20 md:top-60 text-white p-2">
                <div>
                    <h4 class="font-bold" style="font-size:50px;">Career Opportunies</h4>
                </div>
                <button class="btn btn-primary">Join Us</button>
            </div>
        </section>

        <section class="container py-10">
            <h2>Positions</h2>
            <v-expansion-panels>
                <v-expansion-panel v-for="(position) in positions" :key="position.id">
                    <v-expansion-panel-title>
                        Class Teacher
                    </v-expansion-panel-title>
                    <v-expansion-panel-text>
                        <div class="d-md-flex justify-content-between">
                            <!-- Position Details -->
                            <div class="me-md-4 flex-fill">
                                <p><strong>Position:</strong> {{ position.name }}</p>
                                <p><strong>Salary:</strong> {{ position.salary ?? '-' }}</p>
                                <p><strong>Date:</strong> {{ position.date }}</p>
                                <p><strong>Place:</strong> {{ position.place }}</p>
                                <p><strong>Responsibilities:</strong> {{ position.responsibilities }}</p>
                                <p><strong>Requirements:</strong> {{ position.requirements }}</p>
                                <p><strong>Highlights:</strong> {{ position.highlight }}</p>
                                <p><strong>Benefits:</strong>{{ position.benefits }}</p>

                            </div>
                            <!-- Application Form -->
                            <div class="border rounded p-3 flex-fill" style="max-width: 490px;">
                                <input type="text" placeholder="Name" class="w-full px-4 py-2 border rounded-lg mb-4">
                                <input type="text" placeholder="Email" class="w-full px-4 py-2 border rounded-lg mb-4">
                                <div class="flex items-center mb-4">
                                    <span class="px-3 py-2 border border-r-0 rounded-l-lg bg-gray-100">+95</span>
                                    <input type="text" placeholder="Phone"
                                class="w-full px-4 py-2 border border-l-0 rounded-r-lg focus:outline-none">
                                </div> 
                               <textarea placeholder="Massage"
                                    class="w-full px-4 py-2 border rounded-lg mb-4"></textarea>
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

const props = defineProps({
    positions: Array,
});
</script>

<style lang="scss" scoped></style>
