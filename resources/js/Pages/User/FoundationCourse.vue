<template>
    <Layout>
        <section class="vh-20" id="foundation-course">
            <div class="hidden md:block">
                <img src="../User/images/foundation-course.jpg" alt="" class="w-full object-fit-cover"
                    style="height: 700px" />
            </div>
            <div class="hidden md:block absolute left-30 top-40 md:left-60 md:top-60 lg:left-40 lg:top-60 text-white p-2">
                <h4 class="font-bold mx-20" style="font-size:70px;">Foundation Courses</h4>
            </div>
        </section>
        <p class="text-4xl md:text-5xl lg:text-5xl py-2 my-5 text-center font-bold">Foundation Courses</p>
        <section class="container pb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
                <div class="flex flex-col sm:flex-row rounded-lg overflow-hidden" v-for="course in foundationCourses"
                    :key="course.id">
                    <div class="w-full sm:w-70 h-40 overflow-hidden shadow-lg">
                        <img :src="course.image" alt="" class="w-full h-full object-cover" />
                    </div>
                    <div class="mx-3 mt-3 text-center md:!text-left">
                        <p class="font-bold text-lg">Title : {{ course.title }}</p>
                        <p class="text-md">Age : {{ course.age }}</p>
                        <p class="text-md">Duration : {{ course.duration }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- <p class="font-bold text-xl text-center sm:text-left text-lg">Course : {{ course.name }}</p>
                            <p class="text-center sm:text-left text-lg">Duration : {{ course.duration }}</p>
                            <span class="block text-center sm:text-left text-lg">{{ course.months }}</span> -->


    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import imageCard from "../User/Components/imageCard.vue";

const props = defineProps({
    foundationCourses: Array,
});
</script>

<style lang="scss" scoped></style>
