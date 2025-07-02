<template>
    <Layout>
        <section class="vh-20" id="foundation-course">
            <div>
                <img src="../User/images/home.jpg" alt="" class="w-full object-cover" style="height: 300px" />
            </div>
            <div class="absolute left-0 top-60 text-white p-2">
                <h3 class="font-bold mx-20" style="font-size:50px;">Exam Services</h3>
            </div>
        </section>

        <section class="bg-green-200" id="cambridge-exam-courses">
            <div class="max-w-7xl mx-auto mt-5">
                <h3 class="py-4 text-center">Cambridge Exam Courses</h3>
                <div class="grid grid-cols-1 md:grid-cols-1 place-items-center my-5">
                    <div v-for="course in cambridgeExamCourses" :key="course.id" class="flex items-end">
                        <div class=" w-96 h-60 overflow-hidden rounded-2xl shadow-lg ">
                            <img src="../User/images/home.jpg" alt="" class="w-full h-full object-cover" />
                        </div>
                        <div class=" w-70 h-51 overflow-hidden rounded-2xl shadow-lg p-3">
                            <h6 class="font-bold text-xl">Course : {{ course.name }}</h6>
                            <p>Duration : {{ course.duration }}</p>
                            <span class="ml-18">{{ course.months }}</span>
                            <button class="btn btn-success float-end my-3">email me <font-awesome-icon
                                    icon="fa-solid fa-envelope" /></button>
                        </div>
                    </div>
                </div>



            </div>
        </section>

        <section class="vh-20 position-relative" id="foundation-course">
            <div>
                <img src="../User/images/home.jpg" alt="" class="w-full object-cover" style="height: 300px" />
            </div>
            <div class="absolute left-0 top-30 text-white p-2">
                <h3 class="font-bold mx-20" style="font-size:50px;">Exam Services</h3>
            </div>
        </section>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";

const props = defineProps({
    cambridgeExamCourses : Array
})
</script>

<style lang="scss" scoped></style>
