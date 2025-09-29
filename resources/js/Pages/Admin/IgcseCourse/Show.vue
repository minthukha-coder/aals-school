<template>
    <Layout>
        <div class="container mx-auto p-6">
            <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <v-img
                        v-if="course.image"
                        :src="course.image"
                        :height="220"
                        class="rounded-lg w-full md:w-1/3"
                        cover
                    />
                    
                    
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">
                            {{ course.title }}
                        </h2>
                        <p class="text-gray-600 mb-2">
                            <strong>Duration:</strong> {{ course.duration }}
                        </p>
                        <p class="text-gray-600 mb-2">
                            <strong>Monthly Price:</strong> 
                            <span class="text-green-600 font-semibold">
                                {{ course.price_monthly.toLocaleString() }} Ks
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">
                Subjects
            </h3>

            <div v-if="course.subjects && course.subjects.length > 0" 
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                
                <div v-for="(subject, index) in course.subjects" :key="index"
                    class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition">
                    
                    <v-img
                        v-if="subject.image"
                        :src="subject.image"
                        :height="150"
                        class="rounded mb-3"
                        cover
                    />

                    <h4 class="text-lg font-semibold text-gray-700">
                        {{ subject.title }}
                    </h4>
                </div>
            </div>

            <div v-else class="text-center text-gray-500 mt-4">
                No subjects added yet.
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '@/Pages/Admin/Layouts/Layout.vue'

const props = defineProps({
    course: Object
})
</script>

<style scoped>
.container {
    max-width: 1000px;
}
</style>
