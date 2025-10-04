<template>
    <Layout>
        <section class="vh-20" id="foundation-course">
            <div class="hidden md:block">
                <img src="../User/images/additional-course2.jpg" alt="" class="w-full object-fit-cover" style="height:500px;" />
            </div>
            <div class="hidden md:block absolute left-0 top-40 md:left-20 md:top-60 text-white p-2">
                <h4 class="font-bold mx-20" style="font-size:70px;">Additional Courses</h4>
            </div>
        </section>
        <p class="text-4xl py-2 my-5 text-center font-bold">Additional Courses</p>
        <section class="container pb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
                <div class="flex flex-col sm:flex-row rounded-lg overflow-hidden" v-for="course in additionalCourses" :key="course.id">
                    <div class="w-full sm:w-70 h-40 overflow-hidden shadow-lg ">
                        <img :src="course.image" alt="" class="w-full h-full object-cover" style="height:100%;" />
                    </div>
                    <div class="text-center md:!text-left mx-3 mt-3">
                        <p class="font-bold text-lg">Course : {{ course.title }}</p>
                        <p class="text-md">Duration : {{ course.duration }}</p>
                    </div>
                </div>
            </div>
        </section>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";

const props = defineProps({
    additionalCourses : Array
})
</script>

<style lang="scss" scoped></style>
