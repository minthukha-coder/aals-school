<template>
    <Layout>
        <section>
            <div class="hidden md:block ">
                <img
                    src="../User/images/igcse-course.jpg"
                    alt="IGCSE Banner"
                    class="w-full object-cover" style="height: 500px"
                />
            </div>
        </section>
        <p class="text-4xl py-2 my-5 text-center font-bold">IGCSE Courses</p>
        <section class="container my-6">
            <div v-for="igcse in igcseCourses" :key="igcse.id" class="mb-8">
                <div class="mx-auto max-w-lg rounded-lg overflow-hidden shadow-lg bg-white">
                    <img v-if="igcse.image" :src="igcse.image" alt="Course Image" class="w-full h-64 object-cover" />
                    <div class="px-4">
                        <p class="font-bold text-xl mb-2 my-3">{{ igcse.title }}</p>
                        <p class="text-gray-700 mb-1">Duration: {{ igcse.duration }}</p>
                        <p class="text-gray-700">Monthly Price: {{ igcse.price_monthly }} Ks per month</p>
                    </div>
                </div>

                <p class="text-2xl py-2 text-center font-semibold mt-4">Subjects</p>

                <div v-if="igcse.subjects && igcse.subjects.length"
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <div v-for="subject in igcse.subjects" :key="subject.id" class="flex flex-col items-center">
                        <div class="w-full max-w-xs md:max-w-sm h-48 md:h-56 overflow-hidden rounded-lg shadow-lg">
                            <img :src="subject.image" alt="" class="w-full h-full object-cover" />
                        </div>

                        <p class="font-semibold text-xl text-gray-700 text-center mt-2">{{ subject.title }}</p>

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
