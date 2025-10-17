<template>

    <Head title="Cambridge Exam Course - Aung Academy Language School" />

    <Layout>
        <section class="vh-20" id="foundation-course">
            <div class="hidden md:block">
                <img src="../User/images/cambridge-course.jpg" alt="" class="w-full h-full object-fit-cover" />
            </div>

            <div class="hidden md:block absolute left-30 top-50 text-white p-2">
                <h3 class="font-bold mx-20" style="font-size:60px;">Exam Services</h3>
            </div>
        </section>

        <section class="" id="cambridge-exam-courses">
            <div class="max-w-7xl mx-auto">
                <p class="text-4xl md:text-5xl lg:text-5xl py-2 my-5 text-center font-bold">Cambridge Exam Courses</p>
                <div class="grid grid-cols-1 md:grid-cols-1 place-items-center my-3">
                    <div v-for="course in cambridgeExamCourses" :key="course.id"
                        class="flex flex-col sm:flex-row items-end my-2">

                        <div class="w-[90%] sm:w-96 h-auto overflow-hidden rounded-2xl shadow-lg mx-auto sm:mb-0">
                            <img :src="course?.image" alt="" class="w-full h-full object-cover rounded-2xl" />
                        </div>
                        <div class="w-full sm:w-70 h-auto overflow-hidden rounded-2xl shadow-lg p-3 mx-auto sm:mx-0">
                            <p class="font-bold text-center sm:text-left text-lg">Course : {{ course.name }}</p>
                            <p class="text-center sm:text-left text-lg">Duration : {{ course.duration }}</p>
                            <span class="block text-center sm:text-left text-lg">{{ course.months }}</span>
                            <div class="flex justify-center sm:justify-end my-3">
                                <button @click="openEmail" class="btn btn-success">
                                    email me <font-awesome-icon icon="fa-solid fa-envelope"/>
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
import { Head } from '@inertiajs/vue3'

const props = defineProps({
    cambridgeExamCourses: Array
})

const openEmail = () => {
    const recipient = "chitmyatnoeaung01@gmail.com";
    const subject = encodeURIComponent("Hello!");
    const body = encodeURIComponent("Your message here.");

    // Correct Gmail URL
    const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${recipient}&su=${subject}&body=${body}`;
    window.open(gmailUrl, "_blank");
};


</script>

<style lang="scss" scoped></style>
