<template>

    <Head title="Cambridge Course - Aung Academy Language School" />

    <Layout>
        <section class="vh-20" id="foundation-course">
            <div class="hidden md:block">
                <img src="../User/images/cambridge-course.jpg" alt="" class="w-full h-full object-fit-cover" />
            </div>

            <div class="hidden md:block absolute left-30 top-50 text-white p-2">
                <h4 class="font-bold mx-20" style="font-size:70px;">Cambridge Academic Courses</h4>
            </div>

        </section>

        <p class="text-4xl md:text-5xl lg:text-5xl py-2 my-5 text-center font-bold">Cambridge Academic Courses</p>
        <section class="container pb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
                <div class="flex flex-col sm:flex-row rounded-lg overflow-hidden" v-for="course in cambridgeCourses"
                    :key="course.id">
                    <div class="w-full sm:w-70 h-40 overflow-hidden shadow-lg ">
                        <img :src="course.image" alt="" class="w-full h-full object-cover" style="height:100%;" />
                    </div>
                    <div class="mx-3 mt-3 text-center md:!text-left">
                        <p class="font-bold text-lg">{{ course.title }}</p>
                        <p class="text-md">Course : {{ course.course }}</p>
                        <p class="text-md">Duration : {{ course.duration }}</p>
                    </div>
                </div>
            </div>
        </section>

    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import imageCard from "../User/Components/imageCard.vue";
import { Head } from '@inertiajs/vue3'

const props = defineProps({
    cambridgeCourses: Array,
});
</script>

<style lang="scss" scoped></style>
