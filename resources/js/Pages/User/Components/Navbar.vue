<template>
    <nav class="navbar-section w-full sticky top-0 z-50 bg-white shadow-md">
        <div class="container-fluid flex justify-between items-center">
            <div class="p-3 flex items-center">
                <img src="../images/logo.jpg" alt="" class="rounded-full w-10 h-10" />
                <div class="mx-2">
                    <h5 class="text-sm">AALS</h5>
                </div>
            </div>

            <div id="search">
                <input type="text" class="form-control w-100 h-10 rounded-pill border-2 text-white"
                    placeholder="Search..." style="border:1px solid #80ed99;"/>
            </div>

        </div>

        <div class="bg-green-400 flex justify-between items-center h-14 px-4">
            <h5 class="text-white font-bold !text-base md:!text-lg">Aung Academy Language School</h5>

            <div class="hidden md:flex items-center mx-10">
                <ul class="flex items-center gap-5 font-bold h-full">
                    <li>
                        <a :href="route('home')" class="text-white flex items-center h-full">Home</a>
                    </li>
                    <li class="relative group" id="courses">
                        <a href="#" class="text-white flex items-center h-full">Courses</a>

                        <!-- Dropdown menu -->
                        <div class="absolute top-full left-0 hidden group-hover:flex bg-white text-black p-4 shadow-lg z-10"
                            style="width: 500px">
                            <div class="">
                                <a :href="route('foundation-course')"
                                    class="d-block text-decoration-none text-dark">Foundation
                                    Courses</a>
                                <a :href="route('cambridge-course')"
                                    class="d-block text-decoration-none text-dark">Cambridge
                                    Academic English Courses</a>
                                <a :href="route('additional-course')"
                                    class="d-block text-decoration-none text-dark">Adult
                                    English</a>
                                <a :href="route('additional-course')"
                                    class="d-block text-decoration-none text-dark">International Student Program</a>
                            </div>
                            <div class="h-40 bg-black mx-3" style="width: 2px"></div>
                            <div class="">
                                <a :href="route('cambridge-course')" class="d-block text-decoration-none text-dark">IGCSE English</a>
                                <a :href="route('additional-course')" class="d-block text-decoration-none text-dark">GED</a>
                                <a :href="route('additional-course')" class="d-block text-decoration-none text-dark">IELTS</a>
                                <a :href="route('additional-course')" class="d-block text-decoration-none text-dark">ICT Coding</a>
                                <a :href="route('additional-course')" class="d-block text-decoration-none text-dark">Programming</a>
                            </div>
                        </div>
                    </li>

                    <li class="relative group" id="exam-services">
                        <a href="#" class="text-white flex items-center h-full">Exam Services</a>

                        <!-- Dropdown menu -->
                        <div class="absolute top-full left-0 hidden group-hover:flex bg-white text-black p-6 shadow-lg z-10 rounded-lg space-x-6"
                            style="width: 600px">
                            <div class="p-2">
                                <h6 class="font-bold mb-3">Cambridge Exam Courses</h6>

                                <div class="flex justify-around gap-3">
                                    <div class="flex flex-col justify-center items-center">
                                        <a :href="route('cambridge-exam-course')"
                                            class="block no-underline text-dark hover:text-green-600">KET</a>
                                        <a :href="route('cambridge-exam-course')"
                                            class="block no-underline text-dark hover:text-green-600">PET</a>
                                        <a :href="route('cambridge-exam-course')"
                                            class="block no-underline text-dark hover:text-green-600">FEC</a>
                                    </div>
                                    <div class="w-px bg-black"></div>
                                    <div class="">
                                        <a :href="route('cambridge-exam-course')"
                                            class="block no-underline text-dark hover:text-green-600">Stater</a>
                                        <a :href="route('cambridge-exam-course')"
                                            class="block no-underline text-dark hover:text-green-600">Movers</a>
                                        <a :href="route('cambridge-exam-course')"
                                            class="block no-underline text-dark hover:text-green-600">Flyers</a>
                                    </div>
                                </div>

                            </div>

                            <div class="w-px bg-black"></div>

                            <div class="p-2">
                                <h6 class="font-bold mb-3">International Exam Services</h6>
                                <a :href="route('international-course')" class="block no-underline text-dark hover:text-green-600">IELTS</a>
                                <a :href="route('international-course')" class="block no-underline text-dark hover:text-green-600">GED</a>
                                <a :href="route('international-course')" class="block no-underline text-dark hover:text-green-600">Duolingo</a>
                                <a :href="route('international-course')" class="block no-underline text-dark hover:text-green-600">IGCSE O level
                                    ESL, EFL</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a :href="route('gallery')" class="text-white flex items-center h-full">Gallery</a>
                    </li>
                    <li>
                        <a :href="route('contact')" class="text-white flex items-center h-full">Contact Us</a>
                    </li>
                    <li>
                        <a :href="route('about')" class="text-white flex items-center h-full">About Us</a>
                    </li>
                </ul>
            </div>

            <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="md:hidden text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div v-show="isMobileMenuOpen" class="md:hidden bg-white text-black px-4 pb-4 space-y-2">
            <a :href="route('home')" class="block py-2">Home</a>
            <div>
                <p class="font-bold">Courses</p>
                <div class="pl-4 space-y-1">
                    <a :href="route('foundation-course')" class="block">Foundation Courses</a>
                    <a :href="route('cambridge-course')" class="block">Cambridge Academic English Courses</a>
                    <a :href="route('additional-course')" class="block">Adult English</a>
                    <a href="#" class="block">International Student Program</a>
                    <a href="#" class="block">IGCSE English</a>
                    <a href="#" class="block">GED</a>
                    <a href="#" class="block">IELTS</a>
                    <a href="#" class="block">ICT Coding</a>
                    <a href="#" class="block">Programming</a>
                </div>
            </div>
            <div>
                <p class="font-bold">Exam Services</p>
                <div class="pl-4 space-y-1">
                    <a href="#" class="block">KET</a>
                    <a href="#" class="block">PET</a>
                    <a href="#" class="block">FEC</a>
                    <a href="#" class="block">Starters</a>
                    <a href="#" class="block">Movers</a>
                    <a href="#" class="block">Flyers</a>
                    <a href="#" class="block">IELTS</a>
                    <a href="#" class="block">GED</a>
                    <a href="#" class="block">Duolingo</a>
                    <a href="#" class="block">IGCSE O level ESL, EFL</a>
                </div>
            </div>
            <a href="#" class="block py-2">Gallery</a>
            <a :href="route('contact')" class="block py-2">Contact Us</a>
            <a :href="route('about')" class="block py-2">About Us</a>
        </div>
    </nav>
</template>

<script setup>
import { ref } from 'vue';
const isMobileMenuOpen = ref(false);
</script>

<style scoped>
ul li a{
    text-decoration: none;
    color: white;
}
</style>
