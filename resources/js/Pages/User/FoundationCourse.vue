<template>

    <Head title="Foundation Course - Aung Academy Language School" />

    <Layout>
        <section class="vh-20" id="foundation-course">
            <div class="hidden md:block">
                <img src="../User/images/foundation-course.jpg" alt="" class="w-full h-full object-fit-cover" />
            </div>
            <div class="hidden md:block absolute left-30 top-50 text-white p-2">
                <h4 class="font-bold mx-20" style="font-size:60px;">Foundation Courses</h4>
            </div>
        </section>
        <p class="text-4xl md:text-5xl lg:text-5xl py-2 my-5 text-center font-bold">Foundation Courses</p>
        <section class="container pb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
                <div class="flex flex-col sm:flex-row rounded-lg overflow-hidden" v-for="course in foundationCourses"
                    :key="course.id">
                     <div id="image" class="sm:w-1/2 w-full h-48 overflow-hidden">
                        <img :src="course.image" alt="Course Image"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105 rounded-lg" />
                    </div>
                    <div id="text" class="sm:w-1/2 w-full flex flex-col p-4">
                         <p class="font-bold text-lg text-gray-800 mb-1 break-words">
                             {{ course.title }}
                        </p>
                        <p class="font-bold text-lg text-gray-800 mb-1 break-words">
                            Age: {{ course.age }}
                        </p>
                        <p class="text-lg text-gray-600 break-words">
                            Duration: {{ course.duration }}
                        </p>
                    </div>
                </div>
            </div>
        </section>


    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";

import { Head } from '@inertiajs/vue3'

const props = defineProps({
    foundationCourses: Array,
});
</script>

<style lang="scss" scoped></style>
