<template>
    <Layout>
        <section class="vh-20" id="foundation-course">
            <div>
                <img src="../User/images/home.jpg" alt="" class="w-full object-cover" style="height: 300px" />
            </div>
            <div class="absolute left-20 top-60 text-white p-2">
                <h3 class="font-bold mx-20" style="font-size:50px;">Additional Courses</h3>
            </div>
        </section>

        <section class="bg-green-200" id="additional-courses">
            <div class="max-w-7xl mx-auto py-4">
                <h3 class="py-4">Additional Courses</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 place-items-center p-2">
                    <div class="">
                        <Card :title="'ICT Coding'" />
                    </div>
                    <div class="">
                        <Card :title="'Programming'" />
                    </div>
                    <div class="">
                        <Card :title="'Adult English'" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 place-items-center p-2">
                    <div class="">
                        <Card :title="'ICT Coding'" />
                    </div>
                    <div class="">
                        <Card :title="'Programming'" />
                    </div>
                    <div class="">
                        <Card :title="'Adult English'" />
                    </div>
                </div>
            </div>
        </section>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import Card from "../User/Components/Card.vue";
</script>

<style lang="scss" scoped></style>