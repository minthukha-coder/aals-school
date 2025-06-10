<template>
    <Layout>
        <section class="vh-20" id="foundation-course">
            <div>
                <img src="../User/images/home.jpg" alt="" class="w-full object-cover" style="height: 300px" />
            </div>
            <div class="absolute left-20 top-60 text-white p-2">
                <h3 class="font-bold mx-20" style="font-size:50px;">Foundation Courses</h3>
            </div>
        </section>

        <section class="p-3">
            <div class="grid grid-cols-3">
                <div class="flex gap-2">
                    <imageCard />
                    <div class="flex flex-col mt-3">
                        <span class="font-bold text-base">Beginner 1</span>
                        <span class="font-bold text-base">Age : 5 to 7</span>
                        <span class="font-bold text-base">Duration : 3 months</span>
                    </div>
                </div>

          
            </div>
        </section>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import imageCard from "../User/Components/imageCard.vue";
</script>

<style lang="scss" scoped></style>