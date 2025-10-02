<template>
    <Layout>
        <section>
            <div class="hidden md:block ">
                <img
                    src="../User/images/igcse-course.jpg"
                    alt="IGCSE Banner"
                    class="w-full object-cover" style="height: 400px"
                />
            </div>
        </section>

        <!-- Courses -->
        <section class="container mx-auto my-6 px-4">
            <div
                v-for="igcse in igcseCourses"
                :key="igcse.id"
                class="mb-10"
            >
                <div class="mx-auto rounded-lg overflow-hidden shadow-lg" style="width:600px;height:400px;">
                    <img
                        v-if="igcse.image"
                        :src="igcse.image"
                        alt="Course Image"
                        class="w-full h-40 sm:h-56 md:h-64 object-cover"
                    />
                    <div class="p-4">
                        <p class="font-bold text-lg sm:text-xl">{{ igcse.title }}</p>
                        <p class="text-sm sm:text-base">Duration: {{ igcse.duration }}</p>
                        <p class="text-sm sm:text-base">Monthly Price: {{ igcse.price_monthly }} Ks per month</p>
                    </div>
                </div>

                <!-- Subjects -->
                <p class="text-xl sm:text-2xl py-4 text-center font-semibold">Subjects</p>
                <div
                    v-if="igcse.subjects && igcse.subjects.length"
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6"
                >
                    <div
                        v-for="subject in igcse.subjects"
                        :key="subject.id"
                        class="p-4 flex flex-col items-center"
                    >
                        <div class="w-full h-32 sm:h-40 overflow-hidden shadow-md rounded-lg mb-2">
                            <img
                                :src="subject.image"
                                alt=""
                                class="w-full h-full object-cover"
                            />
                        </div>
                        <p class="font-semibold text-gray-700 text-center text-sm sm:text-base">
                            {{ subject.title }}
                        </p>
                    </div>
                </div>
                <div v-else class="text-center text-gray-500 mt-2">
                    No subjects added yet.
                </div>
            </div>
        </section>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";

const props = defineProps({
    igcseCourses: Array
});
</script>
