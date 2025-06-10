<template>
    <Layout>
        <div class="main-page">
            <section class="hidden md:block home-page position-relative vh-90">
                <div>
                    <img :src="homeImage?.name" alt="" class="w-full object-cover" style="height: 500px" />
                </div>
                <div class="absolute left-20 top-30 text-white p-2">
                    <h3 class=" font-bold" style="font-size:40px;">Welcome To AALS</h3>
                    <span class="text-2xl font-bold" style="font-size:40px;">Aung Academy Language School</span>
                </div>
            </section>

            <section class="block md:hidden home-page position-relative vh-40">
                <div>
                    <img src="../User/images/home.jpg" alt="" class="w-full object-cover" style="height: 300px" />
                </div>
                <div class="absolute left-0 top-0 text-white p-2">
                    <h3 class=" font-bold" style="font-size:40px;">Welcome To AALS</h3>
                    <span class="text-2xl font-bold" style="font-size:40px;">Aung Academy Language School</span>
                </div>
            </section>

            <section class="mt-5 max-w-7xl mx-auto" id="about-us">
                <h3 class="text-center font-bold text-2xl">About Us</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <div class="px-5">
                        <img src="../User/images/home.jpg" alt="" class="rounded-tr-[100px] rounded-bl-[100px]" />
                    </div>
                    <div class="p-2">
                        <h2 class="font-bold text-xl">Heading 2</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi
                            atque optio iste culpa molestiae dolores, qui assumenda? Eligendi
                            non odit consequatur quos voluptates provident error veritatis
                            corporis quaerat. Quam, at! <a :href="route('about')">Read More....</a>
                        </p>
                    </div>
                </div>
            </section>

            <section class="mt-5 max-w-7xl mx-auto" id="courses">
                <h3 class="text-center font-bold text-2xl">Courses</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <div class="px-5">
                        <img src="../User/images/home.jpg" alt="" class="" />
                    </div>
                    <div class="p-2">
                        <h2 class="font-bold text-xl">Foundation Course</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi
                            atque optio iste culpa molestiae dolores, qui assumenda? Eligendi
                            non odit consequatur quos voluptates provident error veritatis
                            corporis quaerat. Quam, at!
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <div class="p-2">
                        <h2 class="font-bold text-xl">Cambridge Academic Courses</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi
                            atque optio iste culpa molestiae dolores, qui assumenda? Eligendi
                            non odit consequatur quos voluptates provident error veritatis
                            corporis quaerat. Quam, at!
                        </p>
                    </div>

                    <div class="px-5">
                        <img src="../User/images/home.jpg" alt="" class="" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <div class="px-5">
                        <img src="../User/images/home.jpg" alt="" class="" />
                    </div>
                    <div class="p-2">
                        <h2 class="font-bold text-xl">International Exam Services</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi
                            atque optio iste culpa molestiae dolores, qui assumenda? Eligendi
                            non odit consequatur quos voluptates provident error veritatis
                            corporis quaerat. Quam, at!
                        </p>
                    </div>
                </div>
            </section>

            <section class="bg-green-200 my-4" id="additional-courses">
                <div class="max-w-7xl mx-auto md:mt-5">
                    <h3 class="py-4 p-2">Additional Courses</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 space-x-4 gap-3 mb-3 border border-green-500 p-3">
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

            <section class="hidden md:block h-[90vh]" id="learning-pathway">
                <div class="relative w-full h-full">
                    <img src="../User/images/home.jpg" alt="" class="w-full h-full object-cover rounded-lg" />
                    <h3 class="absolute left-8 top-1/8 transform
               text-white font-bold" style="font-size:70px;">
                        Learning Pathway
                    </h3>
                    <div
                        class="flex items-center absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-400 py-2 px-10 h-15 rounded-lg text-white font-bold ">
                        <button class="">Click
                            Here</button>
                    </div>
                </div>
            </section>

            
            <section class="block md:hidden h-[70vh]" id="learning-pathway">
                <div class="relative w-full h-full">
                    <img src="../User/images/home.jpg" alt="" class="w-full h-full object-cover rounded-lg" />
                    <h3 class="absolute left-5 top-5 transform
               text-white font-bold" style="font-size:40px;">
                        Learning Pathway
                    </h3>
                    <div
                        class="flex items-center absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-400 py-2 px-10 h-15 rounded-lg text-white font-bold ">
                        <button class="">Click
                            Here</button>
                    </div>
                </div>
            </section>


            <section id="partnership" class="mt-5 max-w-7xl mx-auto ">
                <h3 class="font-bold text-center mb-4">Partnership</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="border border-danger card p-3 w-full">
                        <h4>British Council</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, exercitationem nemo
                            minus, atque delectus facilis eaque eos libero totam temporibus ipsa nobis quo dolores nam
                            velit vero at, placeat quis. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nostrum pariatur illum corporis aliquid adipisci nam exercitationem error sunt earum
                            distinctio quia magni ipsa aspernatur soluta, impedit eaque modi cumque dolor! Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit. Sint quam sapiente voluptate perspiciatis
                            enim. Ipsum rerum, nisi quaerat ipsa reprehenderit sit assumenda sapiente quidem cupiditate
                            aliquam accusantium ratione, error quia. Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Ducimus, aperiam a molestiae sit voluptatibus quod deserunt nemo. Blanditiis, suscipit
                            expedita laudantium quisquam ipsam, totam labore placeat neque magnam ullam eligendi.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 relative">
                        <imageCard />
                        <div
                            class="bg-green-300 w-90 h-40 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-3 text-center text-white font-bold z-[-2]">
                        </div>
                        <imageCard class="absolute top-1/2 right-0" />
                    </div>
                </div>
            </section>

            <section id="student-learning">
                <img src="../User/images/cambridge-logo.webp" alt="" style="width: 60px;">
            </section>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import Card from "../User/Components/Card.vue";
import imageCard from "../User/Components/imageCard.vue";

const props = defineProps({
    homeImage: Object,
});
</script>

<style lang="scss" scoped></style>