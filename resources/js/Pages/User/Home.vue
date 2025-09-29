    <template>
        <Layout>
            <div class="main-page">
                <section class="block md:hidden home-page position-relative">
                    <div>
                        <img src="../User/images/home-phone-size.jpg" alt="" class="w-full object-cover" style="height: 500px" />
                    </div>
                    <div class="absolute left-0 top-20 text-white p-2">
                        <h3 class=" font-bold" style="font-size:40px;">Welcome To AALS</h3>
                        <span class="text-2xl font-bold" style="font-size:40px;">Aung Academy Language School</span>
                    </div>
                </section>

                <section class="hidden md:block home-page position-relative ">
                    <div class="row justify-content-center items-center">
                        <div class="col-md-12">
                            <img :src="homeImage?.name" alt="Home Image" class="img-fluid w-100"
                                style="height:90vh; object-fit: cover;" />
                        </div>
                    </div>

                    <!-- <div class="absolute left-50 top-30 text-white p-2">
                        <h3 class=" font-bold" style="font-size:40px;">Welcome To AALS</h3>
                        <span class="text-2xl font-bold" style="font-size:40px;">Aung Academy Language School</span>
                    </div> -->
                </section>

                <section class="mt-5 max-w-7xl mx-auto" id="about-us">
                    <p class="text-center font-bold text-2xl">About Us</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                        <div class="px-5">
                            <img :src="about?.image" alt="" class="w-100 rounded-tr-[100px] rounded-bl-[100px]"
                                style="height:300px;" />
                        </div>
                        <div class="p-2">
                            <h3 class="font-bold text-lg">{{ about?.title }}</h3>
                            <p>
                                {{ about?.description }}<a :href="route('about')" class="text-decoration-none no-underline text-black"><span v-if="about?.description" > Read
                                        More....</span></a>
                            </p>
                        </div>
                    </div>
                </section>

                <section class="my-5 max-w-7xl mx-auto" id="courses">
                    <p class="text-center font-bold text-2xl">Courses</p>
                    <div v-for="(course, index) in courses" :key="course.id"
                        class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">

                        <template v-if="index !== 1">

                            <div class="px-5">
                                <img :src="course?.image" alt="" class="w-100" style="height:250px;object-fit:cover;" />
                            </div>
                            <div class="p-2">
                                <h3 class="font-bold text-xl">{{ course.title }}</h3>
                                <p class="mt-3">
                                    {{ course.description }}
                                </p>
                            </div>
                        </template>

                        <template v-else>
                            <div class="p-2">
                                <h3 class="font-bold text-xl">{{ course.title }}</h3>
                                <p class="mt-3">
                                    {{ course.description }}
                                </p>
                            </div>

                            <div class="px-5">
                                <img :src="course?.image" alt="" class="w-100" style="height:250px;object-fit:cover;" />
                            </div>
                        </template>
                    </div>
                </section>

                <section class="bg-green-200" id="additional-courses">
                    <div class="max-w-7xl mx-auto md:mt-5">
                        <p class="pt-3 text-2xl font-bold">Additional Courses</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 space-x-4 gap-3 mb-3 border border-green-500 p-3">
                            <div v-for="course in additionalCourses" :key="course.id" class="">
                                <Card :course="course" />
                            </div>
                        </div>
                    </div>
                </section>

                <section class="hidden md:block" id="learning-pathway">
                    <div class="relative w-full h-full">
                        <img src="../User/images/learning-pathway.png" alt="" class="w-full h-full object-fit-cover"
                            style="height:600px;" />
                        <h3 class="absolute left-8 top-1/4 transform
               text-white font-bold" style="font-size:70px;">
                            Learning Pathway
                        </h3>
                        <div
                            class="flex items-center absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-400 py-2 px-10 h-15 rounded-lg text-white font-bold ">
                            <Link :href="route('learning-pathway')"><button class="text-white">Click
                                Here</button></Link>
                        </div>
                    </div>
                </section>

                <section id="partnership" class="mt-5 max-w-7xl mx-auto" style="margin-bottom:100px;">
                    <p class="font-bold text-center pb-15 text-2xl">Partnership</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 ">
                        <!-- Left Text Card -->
                        <div class="border border-black card p-3 w-full">
                            <h4>{{ partnership?.title }}</h4>
                            <p>{{ partnership?.description }}</p>
                        </div>

                        <div class="relative grid grid-cols-1 gap-4 md:block">

                            <imageCard :image="partnership?.image1" class="
          w-full md:w-1/2
          md:absolute md:top-[-50px] md:left-0
        " />

                            <div class="
          bg-green-300 w-full md:w-1/2 h-40
          p-3 text-center text-white font-bold
          md:absolute md:top-1/2 md:left-1/2
          md:transform md:-translate-x-1/2 md:-translate-y-1/2
          md:z-[-2] hidden md:block
        ">
                            </div>

                            <imageCard :image="partnership?.image2" class="
          w-full md:w-1/2
          md:absolute md:top-1/2 md:right-0
        " />
                        </div>
                    </div>
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
    about: Object,
    courses: Array,
    additionalCourses: Array,
    partnership: Object,

});
</script>

<style lang="scss" scoped></style>
