    <template>

        <Head title="Home - Aung Academy Language School" />

        <Layout>
            <div class="main-page">
                <section class="block md:hidden home-page position-relative">
                    <div>
                        <img src="../User/images/home-phone-size.jpg" alt="" class="w-full object-cover"
                            style="height: 500px" />
                    </div>
                    <div class="absolute left-0 top-20 text-white p-2">
                        <h3 class=" font-bold" style="font-size:50px;">Welcome To </h3>
                        <h3 class="text-2xl font-bold" style="font-size:40px;">AALS - <span style="font-size:35px;">Aung
                                Academy Language School</span></h3>
                    </div>
                </section>

                <section class="hidden md:block home-page position-relative ">
                    <div class="row justify-content-center items-center">
                        <div class="col-md-12">
                            <img :src="homeImage?.name" alt="Home Image" class="img-fluid w-100"
                                style="height:90vh; object-fit: cover;" />
                        </div>
                    </div>

                    <div class="absolute left-20 top-40 text-white p-2">
                        <h3 class=" font-bold" style="font-size:60px;">Welcome To </h3>
                        <h3 class="text-2xl font-bold" style="font-size:60px;">AALS - <span style="font-size:40px;">Aung
                                Academy Language School</span></h3>
                    </div>
                </section>

                <section class="mt-5 container" id="about-us">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                        <div class="flex justify-center">
                            <img :src="about?.image" alt="" class="object-cover"
                                style="max-width:100%;height:450px;" />
                        </div>
                        <div class="flex justify-center flex-col p-2">
                            <h3 class="font-bold text-lg">{{ about?.title }}</h3>
                            <p class="">{{ about?.subtitle }}</p>
                            <p>
                                {{ about?.description?.length > 200 ? about?.description.slice(0, 200) :
                                    about?.description }}
                                <a v-if="about?.description?.length > 40" :href="route('about')"
                                    class="text-decoration-none no-underline ">
                                    Read More....
                                </a>
                            </p>

                        </div>
                    </div>
                </section>

                <section class="my-5 container" id="courses">
                    <p class="text-center font-bold text-4xl md:text-5xl">Courses</p>
                    <div v-for="(course, index) in courses" :key="course.id"
                        class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">

                        <template v-if="index !== 1">

                            <div class="">
                                <img :src="course?.image" alt="" class="w-100" style="height:250px;object-fit:cover;" />
                            </div>
                            <div class="p-2">
                                <h3 class="font-bold text-2xl">{{ course?.title }}</h3>
                                <p class="mt-3">
                                    {{ course?.description }}
                                </p>
                            </div>
                        </template>

                        <template v-else>
                            <div class="p-2">
                                <h3 class="font-bold text-xl">{{ course?.title }}</h3>
                                <p class="mt-3">
                                    {{ course?.description }}
                                </p>
                            </div>

                            <div class="">
                                <img :src="course?.image" alt="" class="w-100" style="height:250px;object-fit:cover;" />
                            </div>
                        </template>
                    </div>
                </section>

                <section class="bg-green-200 pb-5" id="additional-courses">
                    <div class="container md:mt-5">
                        <p class="py-4 text-4xl md:text-5xl text-center font-bold">Additional Courses</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 space-x-4 gap-3 mb-3 ">
                            <div v-for="course in additionalCourses.slice(0, 3)" :key="course.id" class="">
                                <Card :course="course" />
                            </div>
                        </div>
                    </div>
                </section>

                <section class="" id="learning-pathway">
                    <div class="relative w-full h-full">
                        <img src="../User/images/learning-pathway.png" alt="" class="w-full h-full object-fit-cover"
                            style="height:600px;" />
                        <div class="hidden md:block">
                            <h3 class="absolute left-8 top-1/4 transform
               text-white font-bold" style="font-size:70px;">
                                Learning Pathway
                            </h3>
                        </div>

                        <div class="block md:hidden">
                            <h3 class="absolute left-8 top-10 transform
               text-white font-bold" style="font-size:40px;">
                                Learning Pathway
                            </h3>
                        </div>
                        <div
                            class="flex items-center absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-400 py-2 px-10 h-15 rounded-lg text-white font-bold ">
                            <Link :href="route('learning-pathway')"><button class="text-white">Click
                                Here</button></Link>
                        </div>
                    </div>
                </section>

                <section id="partnership" class="container pb-0 md:!pb-5" style="margin-bottom:100px;">
                    <p class="font-bold text-center text-4xl md:text-5xl my-4 md:my-5 lg:my-5">Partnership</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:!pt-16 lg:!pt-16">
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
import { Head } from '@inertiajs/vue3'

const props = defineProps({
    homeImage: Object,
    about: Object,
    courses: Array,
    additionalCourses: Array,
    partnership: Object,

});
</script>

<style lang="scss" scoped></style>
