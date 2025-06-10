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
                <div class="flex gap-2">
                    <imageCard />
                    <div class="flex flex-col mt-3">
                        <span class="font-bold">Cambridge 1</span>
                        <span class="font-bold">Courses : Academic Foundation Course</span>
                        <span class="font-bold">Duration : 10+2 months</span>
                    </div>
                </div>


                <section class="position-relative w-100">
                <div>
                    <img src="../User/images/home.jpg" alt="" class="w-full object-cover" style="height: 300px" />
                </div>
                <div class="absolute left-30 top-20 text-white p-2">
                    <h3 class="font-bold" style="font-size:40px;">IGCSE</h3>
                    <span class="text-2xl font-bold">Duration :  10 Months</span>
                </div>
            </section>
       
             
            </div>
        </section>

    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import imageCard from "../User/Components/imageCard.vue";
</script>

<style lang="scss" scoped>

</style>