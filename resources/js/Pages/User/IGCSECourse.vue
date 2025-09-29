<template>
    <Layout>
        <section class="vh-20">
            <img src="../User/images/igcse (2).jpg" alt="IGCSE Banner" class="w-full object-cover"
                style="height: 300px;" />
        </section>
        <section class="container my-6">
            <div v-for="igcse in igcseCourses" :key="igcse.id" class="mb-8">
                <div class="mx-auto rounded-lg overflow-hidden shadow-lg" style="width:600px;">
                    <img v-if="igcse.image" :src="igcse.image" alt="Course Image" class="w-full object-cover h-64" />
                    <div class="p-4">
                        <p class="font-bold text-lg">{{ igcse.title }}</p>
                        <p>Duration: {{ igcse.duration }}</p>
                        <p>Monthly Price: {{ igcse.price_monthly }} Ks per month</p>
                    </div>
                </div>

                <p class="text-2xl py-2 text-center font-semibold mt-4">Subjects</p>
                <div v-if="igcse.subjects && igcse.subjects.length"
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div v-for="subject in igcse.subjects" :key="subject.id" class=" p-4 flex flex-col items-center">
                        <div class="w-full sm:w-70 h-40 overflow-hidden shadow-md mb-2">
                            <img :src="subject.image" alt="" class="w-full h-full object-cover" />
                        </div>
                        <p class="font-semibold text-gray-700 text-center">{{ subject.title }}</p>
                    </div>
                </div>
                <div v-else class="text-center text-gray-500 mt-2">
                    No subjects added yet.
                </div>
            </div>
        </section>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";

const props = defineProps({
    igcseCourses: Array
});
</script>

<style scoped>
/* optional custom styles */
</style>
