<template>
    <Layout>
        <!-- Hero Section -->
        <section class="vh-20 relative" id="international-course">
            <div class="hidden md:block">
                <img src="../User/images/international-student-exam.jpg" alt="" class="w-full object-cover"
                    style="height: 500px" />
            </div>
            <div class="hidden md:block absolute left-0 top-60 text-white p-2">
                <h3 class="font-bold mx-20 text-5xl">Exam Services</h3>
            </div>
        </section>

        <section class="" id="international-exam-courses">
            <div class="max-w-7xl mx-auto">
                <p class="text-5xl py-2 my-5 text-center font-bold">International Exam Courses
                </p>
                <div class="grid grid-cols-1 md:grid-cols-1 place-items-center my-3">
                    <div v-for="course in internationalCourses" :key="course.id"
                        class="flex flex-col sm:flex-row items-end my-2">
                        <!-- <div class="w-full sm:w-96 h-60 overflow-hidden rounded-2xl shadow-lg">
                            <img :src="course?.image" alt="" class="w-full h-full object-cover" />
                        </div> -->
                         <div class="w-[90%] sm:w-96 h-60 overflow-hidden rounded-2xl shadow-lg mx-auto sm:mb-0">
                            <img :src="course?.image" alt="" class="w-full h-full object-cover rounded-2xl" />
                        </div>
                        <div
                            class="w-full sm:max-w-[250px] md:max-w-[300px] h-auto overflow-hidden rounded-2xl shadow-lg p-3 flex flex-col justify-between mx-auto sm:mx-0">
                            <p class="font-bold text-center sm:text-left text-lg mb-2">
                                Course : {{ course.name }}
                            </p>
                            <div class="flex justify-center sm:justify-end mt-2">
                                <button @click="openEmail" class="btn btn-success flex items-center gap-2">
                                    email me <font-awesome-icon icon="fa-solid fa-envelope" />
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- Bottom Hero Section -->
        <!-- <section class="vh-20" id="foundation-course">
            <div>
                <img src="../User/images/international-student-exam.jpg" alt="" class="w-full object-cover"
                    style="height: 300px" />
            </div>
        </section> -->
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";

const props = defineProps({
    internationalCourses: Array,
});

const openEmail = () => {
    const recipient = "chitmyatnoeaung01@gmail.com";
    const subject = encodeURIComponent("Hello!");
    const body = encodeURIComponent("Your message here.");

    const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${recipient}&su=${subject}&body=${body}`;
    window.open(gmailUrl, "_blank");
};
</script>

<style lang="scss" scoped></style>
