<template>
    <div>
        <Layout>
            <h5 class="text-center">Course Page</h5>
            <div class="row">
                <Link :href="route('admin.courses.create')"><button class="btn btn-primary">Create</button></Link>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-3">
                    <div v-for="course in courses" :key="course.id" class="card mb-3">
                        <img :src="course?.image" class="card-img-top" alt="Course Image" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ course.title }}</h5>
                            <p class="card-text">{{ course.description }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </Layout>
    </div>
</template>

<script setup>
import Layout from '../Layouts/Layout.vue';
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    courses: Array,
});
</script>

<style lang="scss" scoped></style>