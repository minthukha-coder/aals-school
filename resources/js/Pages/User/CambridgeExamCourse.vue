<template>
    <Layout>
        <section class="vh-20" id="foundation-course">
            <div class="hidden md:block">
                <img src="../User/images/exam_courses.jpg" alt="" class="w-full object-fit-cover" style="height: 400px" />
            </div>
            <div class="absolute left-0 top-60 text-white p-2">
                <h3 class="font-bold mx-20" style="font-size:50px;">Exam Services</h3>
            </div>
        </section>

        <section class="" id="cambridge-exam-courses">
            <div class="max-w-7xl mx-auto">
                <p class="text-4xl py-2 my-5 text-center font-bold">Cambridge Exam Courses</p>
                <div class="grid grid-cols-1 md:grid-cols-1 place-items-center my-3">
                    <div v-for="course in cambridgeExamCourses" :key="course.id"
                        class="flex flex-col sm:flex-row items-end my-2">
                        <div class="w-full sm:w-96 h-60 overflow-hidden rounded-2xl shadow-lg">
                            <img :src="course?.image" alt="" class="w-full h-full object-cover" />
                        </div>
                        <div class="w-full sm:w-70 h-51 overflow-hidden rounded-2xl shadow-lg p-3 mx-auto sm:mx-0">
                            <p class="font-bold text-center sm:text-left text-lg">Course : {{ course.name }}</p>
                            <p class="text-center sm:text-left text-lg">Duration : {{ course.duration }}</p>
                            <span class="block text-center sm:text-left text-lg">{{ course.months }}</span>
                            <div class="flex justify-center sm:justify-end my-3">
                                <button class="btn btn-success">
                                    email me <font-awesome-icon icon="fa-solid fa-envelope" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";

const props = defineProps({
    cambridgeExamCourses: Array
})
</script>

<style lang="scss" scoped></style>
