<template>
    <Layout>
        <section class="vh-20" id="foundation-course">
            <div>
                <img src="../User/images/home.jpg" alt="" class="w-full object-cover" style="height: 300px" />
            </div>
            <div class="absolute left-0 top-40 md:left-20 md:top-60 text-white p-2">
                <h4 class="font-bold mx-20" style="font-size:50px;">Additional Courses</h4>
            </div>
        </section>

        <section class="" id="additional-courses">
            <div class="max-w-7xl mx-auto py-4">
                <h3 class="py-4 px-1">Additional Courses</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 place-items-center p-2">
                    <div v-for="course in additionalCourses" :key="course.id" class="">
                        <Card :course="course" />
                    </div>

                </div>

            </div>
        </section>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import Card from "../User/Components/Card.vue";

const props = defineProps({
    additionalCourses : Array
})
</script>

<style lang="scss" scoped></style>
