<template>
    <Layout>
        <section class="vh-20" id="international-course">
            <div class="hidden md:block">
                <img src="../User/images/international-student-exam.jpg" alt="" class="w-full object-fit-cover"
                    style="height: 400px" />
            </div>
            <div class="hidden md:block absolute left-20 top-65 text-white p-2">
                <h3 class="font-bold mx-20" style="font-size:50px;">Exam Services</h3>
            </div>
        </section>


        <section class="" id="cambridge-exam-courses">
            <div class="max-w-7xl mx-auto mt-5">
                <h3 class="text-4xl py-2 my-5 text-center font-bold">International Exam Courses</h3>
                <div class="grid grid-cols-1 md:grid-cols-1 place-items-center my-5">
                    <div v-for="course in internationalCourses" :key="course.id" class="flex items-end my-2">
                        <div class=" w-96 h-60 overflow-hidden rounded-2xl shadow-lg ">
                            <img :src="course?.image" alt="" class="w-full h-full object-cover" style="height:100%;" />
                        </div>
                        <div class="w-70 h-51 overflow-hidden rounded-2xl shadow-lg p-3">
                            <h5 class="font-bold text-xl">Course : {{ course.name }}</h5>
                            <button @click="openEmail" class="btn btn-success float-end my-3">email me
                                <font-awesome-icon icon="fa-solid fa-envelope" /></button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="vh-20 position-relative" id="foundation-course">
            <div>
                <img src="../User/images/international-student-exam.jpg" alt="" class="w-full object-cover" style="height: 300px" />
            </div>
            <!-- <div class="absolute left-0 top-30 text-black p-2">
                <h3 class="font-bold mx-20" style="font-size:50px;">Course : IGCSE 0 LEVEL ESL, EFL</h3>
                <h5>Duration : 5 months</h5>
                <p>March, April, May</p>
            </div> -->
        </section>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import imageCard from "../User/Components/imageCard.vue";

const props = defineProps({
    internationalCourses: Array,
});

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
