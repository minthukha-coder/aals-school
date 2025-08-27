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
                                <p><strong>Salary:</strong> {{ position.salary }}</p>
                                <p><strong>Date:</strong> {{ position.date }}</p>
                                <p><strong>Place:</strong> {{ position.place }}</p>
                                <p><strong>Responsibilities:</strong> {{ position.responsibilities }}</p>
                                <p><strong>Requirements:</strong> {{ position.requirements }}</p>
                                <p><strong>Highlights:</strong> {{ position.highlight }}</p>
                                <p><strong>Benefits:</strong>{{ position.benefits }}</p>
                              
                            </div>
                            <!-- Application Form -->
                            <div class="border rounded p-3 flex-fill" style="max-width: 490px;">
                                <v-text-field label="Name" type="" class="mb-2" />
                                <v-text-field label="Email" type="email" class="mb-2" />
                                <v-text-field label="Phone" class="mb-2" />
                                <v-textarea label="Message" rows="3" class="mb-2" />
                                <v-btn color="primary" block @click="applyForPosition(position.id)">Apply</v-btn>
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
