<template>
  <div class="relative">
    <div class="pt-28 pb-3 bg-gradient-to-t from-green-600 via-green-700 to-green-800">
      <div class="flex flex-col md:flex-row justify-evenly items-center md:items-start pt-3 gap-10">

        <!-- Logos -->
      <div class="flex flex-col justify-center mt-5 items-center md:items-start">
          <div>
            <img src="../images/logo-footer.png" class="mx-6" alt="" style="width:100px;">
          </div>
          <div class="flex mx-6 mt-3 items-center">
            <img src="../images/cambridge.png" alt="" style="width:350px;">

          </div>
          <div>
            <img src="../images/british-logo.png" alt="" style="width:210px;">
          </div>
        </div>

        <!-- Site Links -->
        <div class="text-white md:text-left mt-5">
          <h3 class="text-lg font-bold">On this Site</h3>
          <ul class="flex flex-col mt-4 space-y-2 text-center md:!text-start m-0 p-0">
            <li><a :href="route('international-courses')" class="text-white text-lg">Additional Courses</a></li>
            <li><a :href="route('foundation-courses')" class="text-white text-lg">Foundation Courses</a></li>
            <li><a :href="route('cambridge-courses')" class="text-white text-lg">Cambridge Academic</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">Adult English</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">International Student Program</a>
            </li>
            <li><a :href="route('igcse-courses')" class="text-white text-lg">IGCSE</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">GED</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">IELTS</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">ICT Coding</a></li>
          </ul>
        </div>

        <!-- Extra Links -->
        <div class="text-white mt-5">
          <ul class="flex flex-col space-y-2 text-center md:!text-start mt-5">
            <li><a href="#" class="text-white text-lg">Home</a></li>
            <li><a href="#" class="text-white text-lg">Exam Services</a></li>
            <li><a href="#" class="text-white text-lg">Gallery</a></li>
            <li><a href="#" class="text-white text-lg">Contact Us</a></li>
            <li><a href="#" class="text-white text-lg">About Us</a></li>
          </ul>
        </div>

        <!-- Contact Us Section -->
        <div class="flex flex-col text-white items-center md:items-start mt-5">
          <h3 class="text-lg font-bold text-center md:text-left">Contact Us</h3>
          <div class="flex justify-center md:justify-start items-center gap-2 mt-3">
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
          <div class="flex justify-center md:justify-start items-center gap-2 mt-10" id="phone">
            <font-awesome-icon icon="fa-solid fa-phone" class="fs-5" />
            <div class="flex flex-col opacity-80">
              <span>09778695126</span>
              <span>09763381053</span>
            </div>
          </div>
          <div class="flex justify-center md:justify-start items-center gap-2 mt-10" id="email">
            <font-awesome-icon icon="fa-solid fa-envelope" class="fs-4" />
            <span class="opacity-80">chitmyatnoeaung01@gmail.com
            </span>
          </div>
        </div>

      </div>

      <h6 class="text-center text-white mt-5 text-lg">AALS Aung Academy Language School</h6>
    </div>

  </div>

</template>

<script setup>

</script>

<style scoped>
ul li a {
  text-decoration: none;
  color: white;
  opacity: 0.8;
}
</style>
