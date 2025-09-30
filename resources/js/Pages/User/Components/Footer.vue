<template>
  <div class="relative">

    <div class="pt-28 pb-3 bg-gradient-to-t from-green-600 via-green-700 to-green-800">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 justify-items-center md:justify-items-start pt-3">

        <!-- Logos -->
        <div class="grid gap-4 justify-items-center md:justify-items-start mt-5">
          <img src="../images/logo-footer.png" alt="" style="width:100px;">
          <img src="../images/cambridge.png" alt="" style="width:350px;">
          <img src="../images/british-logo.png" alt="" style="width:210px;">
        </div>

        <!-- Site Links -->
        <div class="text-white text-center md:text-left">
          <h3 class="text-lg font-bold">On this Site</h3>
          <ul class="mt-4 space-y-2">
            <li><a :href="route('international-courses')" class="text-white text-lg">Additional Courses</a></li>
            <li><a :href="route('foundation-courses')" class="text-white text-lg">Foundation Courses</a></li>
            <li><a :href="route('cambridge-courses')" class="text-white text-lg">Cambridge Academic</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">Adult English</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">International Student Program</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">IGCSE</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">GED</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">IELTS</a></li>
            <li><a :href="route('international-courses')" class="text-white text-lg">ICT Coding</a></li>
          </ul>
        </div>

        <!-- Extra Links -->
        <div class="text-white text-center md:text-left mt-5 md:mt-0">
          <ul class="space-y-2">
            <li><a href="#" class="text-white text-lg">Home</a></li>
            <li><a href="#" class="text-white text-lg">Exam Services</a></li>
            <li><a href="#" class="text-white text-lg">Gallery</a></li>
            <li><a href="#" class="text-white text-lg">Contact Us</a></li>
            <li><a href="#" class="text-white text-lg">About Us</a></li>
          </ul>
        </div>

        <!-- Contact Us Section -->
        <div class="text-white text-center md:text-left mt-5 md:mt-0">
          <h3 class="text-lg font-bold">Contact Us</h3>
          <div class="grid grid-cols-3 gap-2 justify-center md:justify-start mt-3">
            <div class="bg-blue-500 rounded-full w-10 h-10 grid place-items-center">
              <font-awesome-icon icon="fa-solid fa-envelope" class="text-white" />
            </div>
            <div class="bg-blue-500 rounded-full w-10 h-10 grid place-items-center">
              <font-awesome-icon icon="fa-brands fa-facebook" class="text-white" />
            </div>
            <div class="bg-blue-500 rounded-full w-10 h-10 grid place-items-center">
              <font-awesome-icon icon="fa-solid fa-location-dot" class="text-white" />
            </div>
          </div>

          <div class="grid grid-cols-[auto_1fr] gap-2 mt-10 justify-center md:justify-start items-center">
            <font-awesome-icon icon="fa-solid fa-phone" class="fs-5" />
            <div class="flex flex-col opacity-80">
              <span>09778695126</span>
              <span>09778695126</span>
            </div>
          </div>

          <div class="grid grid-cols-[auto_1fr] gap-2 mt-10 justify-center md:justify-start items-center">
            <font-awesome-icon icon="fa-solid fa-envelope" class="fs-4" />
            <span class="opacity-80">aals123@gmail.com</span>
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
  opacity: 0.8;
}
</style>
