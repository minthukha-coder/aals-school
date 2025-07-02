<template>
    <Layout>
        <section class="vh-20" id="foundation-course">
            <div>
                <img src="../User/images/home.jpg" alt="" class="w-full object-cover" style="height: 300px" />
            </div>
            <div class="absolute left-20 top-60 text-white p-2">
                <h3 class="font-bold mx-20" style="font-size:50px;">Cambridge Academic Courses</h3>
            </div>
        </section>

        <section>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-5 place-items-center">
                <div v-for="course in cambridgeCourses" :key="course.id" class="flex flex-col md:flex-row lg:flex-row gap-2">
                    <imageCard :image="course.image" class="border w-70 h-48 overflow-hidden rounded-2xl shadow-lg "/>
                    <div class="flex flex-col mt-3 mx-2">
                        <span class="font-bold">{{ course.title }}</span>
                        <span class="font-bold">Courses : {{ course.course }}</span>
                        <span class="font-bold">Duration : {{ course.duration }}</span>
                    </div>
                </div>


                <section class="position-relative w-100">
                    <img src="../User/images/home.jpg" alt="" class="w-full object-cover" style="height: 300px" />

                <div class="absolute left-30 top-20 text-white p-2">
                    <h3 class="font-bold" style="font-size:60px;">IGCSE</h3>
                    <span class="text-3xl font-bold">Duration :  10 Months</span>
                </div>
            </section>


            </div>
        </section>

    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import imageCard from "../User/Components/imageCard.vue";

const props = defineProps({
    cambridgeCourses: Array,
});
</script>

<style lang="scss" scoped>

</style>
