    <template>
        <Layout>
            <div class="main-page">
                <section class="hidden md:block home-page position-relative">
                    <div>
                        <img :src="homeImage?.name" alt="" class="w-full object-cover" style="height: 500px" />
                    </div>
                    <div class="absolute left-20 top-30 text-white p-2">
                        <h3 class=" font-bold" style="font-size:40px;">Welcome To AALS</h3>
                        <span class="text-2xl font-bold" style="font-size:40px;">Aung Academy Language School</span>
                    </div>
                </section>

                <section class="block md:hidden home-page position-relative ">
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
                            <img :src="about?.image" alt="" class="rounded-tr-[100px] rounded-bl-[100px]"
                                style="width:400px;height:300px;" />
                        </div>
                        <div class="p-2">
                            <h2 class="font-bold text-xl">{{ about?.title }}</h2>
                            <p>
                                {{ about?.description }}<a :href="route('about')">Read More....</a>
                            </p>
                        </div>
                    </div>
                </section>

                <section class="mt-5 max-w-7xl mx-auto" id="courses">
                    <h3 class="text-center font-bold text-2xl">Courses</h3>
                    <div v-for="(course, index) in courses" :key="course.id"
                        class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">

                        <template v-if="index !== 1">

                            <div class="px-5">
                                <img :src="course?.image" alt="" class="w-100" style="height:250px;object-fit:cover;" />
                            </div>
                            <div class="p-2">
                                <h2 class="font-bold text-xl">{{ course.title }}</h2>
                                <p class="mt-3">
                                    {{ course.description }}
                                </p>
                            </div>
                        </template>

                        <template v-else>
                            <div class="p-2">
                                <h2 class="font-bold text-xl">{{ course.title }}</h2>
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

                <section class="bg-green-200 my-4" id="additional-courses">
                    <div class="max-w-7xl mx-auto md:mt-5">
                        <h3 class="py-4 p-2">Additional Courses</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 space-x-4 gap-3 mb-3 border border-green-500 p-3">
                            <div v-for="course in additionalCourses" :key="course.id" class="">
                                <Card :course="course"/>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="hidden md:block" id="learning-pathway">
                    <div class="relative w-full h-full">
                        <img src="../User/images/home.jpg" alt="" class="w-full h-full object-cover rounded-lg" style="height:500px;"/>
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


                <section id="partnership" class="mt-5 max-w-7xl mx-auto">
                    <h3 class="font-bold text-center pb-15">Partnership</h3>
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
          md:z-[-2]
        ">
                            </div>

                            <imageCard :image="partnership?.image2" class="
          w-full md:w-1/2
          md:absolute md:top-1/2 md:right-0
        " />
                        </div>
                    </div>
                </section>


                <section id="student-learning" class="flex justify-center items-center mt-5">
                    <img src="../User/images/cambridge-logo.png" alt="" style="width: 400px;">
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
