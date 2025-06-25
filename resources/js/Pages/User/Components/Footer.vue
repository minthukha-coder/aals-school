<template>
  <div class="relative mt-4">
    <!-- SVG Wave -->
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute top-0 w-full">
  <path fill="#25a244" fill-opacity="1" d="M0,64L60,80C120,96,240,128,360,117.3C480,107,600,53,720,42.7C840,32,960,64,1080,69.3C1200,75,1320,53,1380,42.7L1440,32L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
</svg> -->

    <!-- Footer Content -->
    <div class="pt-28 pb-3 bg-green-500">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-7xl mx-auto divide-x-2 divide-white-500 pt-3">
        <!-- Contact Us Section -->
        <div class="flex flex-col text-white">
          <h3 class="text-lg font-bold text-white text-center">Contact Us</h3>
          <div class="flex justify-center items-center gap-2 mt-3">
            <div class="flex justify-center items-center bg-blue-500 rounded-full w-10 h-10">
              <font-awesome-icon icon="fa-solid fa-envelope" class="text-white" />
            </div>
            <div class="flex justify-center items-center bg-blue-500 rounded-full w-10 h-10">
              <font-awesome-icon icon="fa-brands fa-facebook" class="text-white" />
            </div>
            <div class="flex justify-center items-center bg-blue-500 rounded-full w-10 h-10">
              <font-awesome-icon icon="fa-solid fa-location-dot" class="text-white" />
            </div>
          </div>
          <div class="flex justify-center items-center gap-2 mt-10" id="phone">
            <div>
              <font-awesome-icon icon="fa-solid fa-phone" />
            </div>
            <div class="flex flex-col">
              <span>09778695126</span>
              <span>09778695126</span>
            </div>
          </div>
          <div class="flex justify-center items-center gap-2 mt-10" id="email">
            <font-awesome-icon icon="fa-solid fa-envelope" />
            <span>aals123@gmail.com</span>
          </div>
        </div>

        <!-- Site Links -->
        <div class="text-white">
          <h3 class="text-lg font-bold text-white text-center md:!text-start">On this Site</h3>
          <ul class="flex flex-col mt-5 text-white text-center md:!text-start">
            <li><a href="#" class="text-white text-lg">Home</a></li>
            <li><a href="#" class="text-white text-lg">Courses</a></li>
            <li><a href="#" class="text-white text-lg">Exam Services</a></li>
            <li><a href="#" class="text-white text-lg">Gallery</a></li>
            <li><a href="#" class="text-white text-lg">Contact Us</a></li>
            <li><a href="#" class="text-white text-lg">About Us</a></li>
          </ul>
        </div>

        <!-- Logos -->
        <div class="flex flex-col justify-center items-center mt-5 ">
          <div class="flex">
            <img src="../images/cambridge-logo.png" alt="" style="width:60px;">
            <div class="ml-2 relative">
              <h3 class="text-white font-bold">CAMBRIDGE</h3>
              <span class="absolute text-xs font-bold text-white top-8 left-1">UNIVERSITY PRESS & ASSESSMENT</span>
            </div>
          </div>
          <div class="pr-5 mt-3">
            <img src="../images/british-logo.png" alt="" style="width:210px;">
          </div>
        </div>
      </div>

      <h5 class="text-center text-white mt-5">AALS Aung Academy Language School</h5>
    </div>
  </div>

</template>

<script setup>

</script>

<style scoped>
ul li a {
  text-decoration: none;
  color: white;
}
</style>