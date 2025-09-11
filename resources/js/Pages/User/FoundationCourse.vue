<template>
    <Layout>
        <section class="vh-20" id="foundation-course">
            <div>
                <img src="../User/images/foundation-cover.jpg" alt="" class="w-full object-cover"
                    style="height: 300px" />
            </div>
            <div class="absolute left-0 top-40 md:left-60 md:top-60 lg:left-40 lg:top-60 text-white p-2">
                <h4 class="font-bold mx-20" style="font-size:40px;">Foundation Courses</h4>
            </div>
        </section>

        <section class="container py-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
                <div class="flex flex-col sm:flex-row rounded-lg overflow-hidden" v-for="course in foundationCourses"
                    :key="course.id">
                    <div class="w-full sm:w-70 h-40 overflow-hidden shadow-lg">
                        <img :src="course.image" alt="" class="w-full h-full object-cover" />
                    </div>
                    <div class="mx-3 mt-3">
                        <p class="font-bold text-base">{{ course.title }}</p>
                        <p class="font-bold text-base">Age : {{ course.age }}</p>
                        <p class="font-bold text-base">Duration : {{ course.duration }}</p>
                    </div>
                </div>
            </div>
        </section>
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
