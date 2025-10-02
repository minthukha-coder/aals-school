<template>
    <nav class="navbar-section w-full sticky top-0 z-50 bg-white shadow-md">
        <div class="container-fluid flex justify-between items-center">
            <div class="p-2 flex items-center">
                <img src="../images/logo.jpg" alt="" class="rounded-full w-12 h-12" />
                <div class="mx-2 mt-2">
                    <h5 class="text-sm">AALS</h5>
                </div>
            </div>

            <div id="search">
                <input v-model="searchQuery" type="text" class="form-control h-10 rounded-pill border-2 text-black"
                    placeholder="Search..."  @keyup.enter="handleSearch" style="width:150px;border:1px solid #80ed99;"/>
            </div>

        </div>

        <div class="bg-gradient-to-t from-green-600 via-green-700 to-green-800
            flex justify-between items-center p-2 shadow-md">
            <h5 class="text-white font-bold !text-base md:!text-lg">Aung Academy Language School</h5>

            <div class="hidden md:flex items-center mx-10">
                <div class="flex items-center gap-5 font-bold h-full">
                    <div>
                        <Link :href="route('home')" class="text-white text-decoration-none flex items-center h-full">Home</Link>
                    </div>

                       <div>
                        <Link :href="route('career')" class="text-white text-decoration-none flex items-center h-full">Career</Link>
                    </div>

                    <div class="relative group" id="courses">
                        <Link href="#" class="text-white text-decoration-none flex items-center h-full">Courses</Link>

                        <!-- Dropdown menu -->
                        <div class="absolute top-full left-0 hidden group-hover:flex bg-white text-black p-4 shadow-lg z-10"
                            style="width: 500px">
                            <div class="">
                                <Link :href="route('foundation-courses')"
                                    class="d-block text-decoration-none text-dark">Foundation
                                    Courses</Link>
                                <Link :href="route('cambridge-courses')"
                                    class="d-block text-decoration-none text-dark">Cambridge
                                    Academic English Courses</Link>
                                <Link :href="route('additional-courses')"
                                    class="d-block text-decoration-none text-dark">Adult
                                    English</Link>
                                <Link :href="route('additional-courses')"
                                    class="d-block text-decoration-none text-dark">International Student Program</Link>
                            </div>
                            <div class="h-40 bg-black mx-3" style="width: 2px"></div>
                            <div class="">
                                <Link :href="route('igcse-courses')" class="d-block text-decoration-none text-dark">IGCSE English</Link>
                                <Link :href="route('additional-courses')" class="d-block text-decoration-none text-dark">GED</Link>
                                <Link :href="route('additional-courses')" class="d-block text-decoration-none text-dark">IELTS</Link>
                                <Link :href="route('additional-courses')" class="d-block text-decoration-none text-dark">ICT Coding</Link>
                                <Link :href="route('additional-courses')" class="d-block text-decoration-none text-dark">Programming</Link>
                            </div>
                        </div>
                    </div>

                    <div class="relative group" id="exam-services">
                        <Link href="#" class="text-white text-decoration-none flex items-center h-full">Exam Services</Link>

                        <!-- Dropdown menu -->
                        <div class="absolute top-full left-0 hidden group-hover:flex bg-white text-black p-6 shadow-lg z-10 rounded-lg space-x-6"
                            style="width: 600px">
                            <div class="p-2">
                                <h6 class="font-bold mb-3">Cambridge Exam Courses</h6>

                                <div class="flex justify-around gap-3">
                                    <div class="flex flex-col justify-center items-center">
                                        <Link :href="route('cambridge-exam-courses')"
                                            class="block text-decoration-none text-dark hover:text-green-600">KET</Link>
                                        <Link :href="route('cambridge-exam-courses')"
                                            class="block text-decoration-none text-dark hover:text-green-600">PET</Link>
                                        <Link :href="route('cambridge-exam-courses')"
                                            class="block text-decoration-none text-dark hover:text-green-600">FEC</Link>
                                    </div>
                                    <div class="w-px bg-black"></div>
                                    <div class="">
                                        <Link :href="route('cambridge-exam-courses')"
                                            class="block text-decoration-none text-dark hover:text-green-600">Stater</Link>
                                        <Link :href="route('cambridge-exam-courses')"
                                            class="block text-decoration-none text-dark hover:text-green-600">Movers</Link>
                                        <Link :href="route('cambridge-exam-courses')"
                                            class="block text-decoration-none text-dark hover:text-green-600">Flyers</Link>
                                    </div>
                                </div>

                            </div>

                            <div class="w-px bg-black"></div>

                            <div class="p-2">
                                <h6 class="font-bold mb-3">International Exam Services</h6>
                                <Link :href="route('international-courses')" class="block text-decoration-none text-dark hover:text-green-600">IELTS</Link>
                                <Link :href="route('international-courses')" class="block text-decoration-none text-dark hover:text-green-600">GED</Link>
                                <Link :href="route('international-courses')" class="block text-decoration-none text-dark hover:text-green-600">Duolingo</Link>
                                <Link :href="route('international-courses')" class="block text-decoration-none text-dark hover:text-green-600">IGCSE O level
                                    ESL, EFL</Link>
                            </div>
                        </div>
                    </div>

                    <div>
                        <Link :href="route('gallery')" class="text-white text-decoration-none flex items-center h-full">Gallery</Link>
                    </div>
                    <div>
                        <Link :href="route('contact')" class="text-white text-decoration-none flex items-center h-full">Contact Us</Link>
                    </div>
                    <div class="">
                        <Link :href="route('about')" class="text-white text-decoration-none flex items-center h-full">About Us</Link>
                    </div>
                </div>
            </div>

            <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="md:hidden text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div v-show="isMobileMenuOpen" class="md:hidden bg-white text-black px-4 pb-4 space-y-2">
            <Link :href="route('home')" class="block py-2 text-black text-decoration-none">Home</Link>
            <div>
                <p class="font-bold">Courses</p>
                <div class="pl-4 space-y-1">
                    <Link :href="route('foundation-courses')" class="block text-black text-decoration-none">Foundation Courses</Link>
                    <Link :href="route('cambridge-courses')" class="block text-black text-decoration-none">Cambridge Academic English Courses</Link>
                    <Link :href="route('additional-courses')" class="block text-black text-decoration-none">Adult English</Link>
                    <Link :href="route('additional-courses')" class="block text-black text-decoration-none">International Student Program</Link>
                    <Link :href="route('igcse-courses')" class="block text-black text-decoration-none">IGCSE English</Link>
                    <Link :href="route('additional-courses')" class="block text-black text-decoration-none">GED</Link>
                    <Link :href="route('additional-courses')" class="block text-black text-decoration-none">IELTS</Link>
                    <Link :href="route('additional-courses')" class="block text-black text-decoration-none">ICT Coding</Link>
                    <Link :href="route('additional-courses')" class="block text-black text-decoration-none">Programming</Link>
                </div>
            </div>
            <div>
                <p class="font-bold">Exam Services</p>
                <div class="pl-4 space-y-1">
                    <Link :href="route('cambridge-exam-courses')" class="block text-black text-decoration-none">KET</Link>
                    <Link :href="route('cambridge-exam-courses')" class="block text-black text-decoration-none">PET</Link>
                    <Link :href="route('cambridge-exam-courses')" class="block text-black text-decoration-none">FEC</Link>
                    <Link :href="route('cambridge-exam-courses')" class="block text-black text-decoration-none">Starters</Link>
                    <Link :href="route('cambridge-exam-courses')" class="block text-black text-decoration-none">Movers</Link>
                    <Link :href="route('cambridge-exam-courses')" class="block text-black text-decoration-none">Flyers</Link>
                    <Link :href="route('international-courses')" class="block text-black text-decoration-none">IELTS</Link>
                    <Link :href="route('international-courses')" class="block text-black text-decoration-none">GED</Link>
                    <Link :href="route('international-courses')" class="block text-black text-decoration-none">Duolingo</Link>
                    <Link :href="route('international-courses')" class="block text-black text-decoration-none">IGCSE O level ESL, EFL</Link>
                </div>
            </div>
            <Link :href="route('gallery')" class="block text-black text-decoration-none py-2">Gallery</Link>
            <Link :href="route('contact')" class="block text-black text-decoration-none py-2">Contact Us</Link>
            <Link :href="route('about')" class="block text-black text-decoration-none py-2">About Us</Link>
        </div>
    </nav>
</template>

<script setup>
import { ref } from 'vue';
const isMobileMenuOpen = ref(false);

const searchQuery = ref('');

function handleSearch() {
  if (searchQuery.value.trim()) {
    window.location.href = `/search?query=${encodeURIComponent(searchQuery.value)}`
  }
}
</script>

<style scoped>

</style>
