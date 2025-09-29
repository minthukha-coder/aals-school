<template>
    <Layout>
        <h5 class="text-center mb-4">IGCSE Courses Page</h5>

        <div class="mb-4 text-end">
            <Link :href="route('admin.igcse-courses.create')">
            <button class="btn btn-success">
                <font-awesome-icon icon="fa-solid fa-circle-plus" /> Create
            </button>
            </Link>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-3">
            <div v-for="course in igcseCourses" :key="course.id" class="card mb-4 shadow rounded overflow-hidden">
                <img :src="course.image" class="card-img-top" alt="Course Image"
                    style="height: 200px; object-fit: cover;" />

                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ course.title }}</h5>
                    <p class="mb-1">Duration: {{ course.duration }}</p>
                    <p>Price: {{ course.price_monthly }} Ks / month</p>
                </div>

                <div class="card-footer bg-white d-flex justify-content-end gap-2 border-top">
                    <Link :href="route('admin.igcse-courses.show', { id: course.id })">
                    <button type="button" class="btn btn-sm btn-outline-info d-flex align-items-center gap-1">
                        <font-awesome-icon icon="fa-solid fa-info-circle" /> Details
                    </button>
                    </Link>

                    <Link :href="route('admin.igcse-courses.edit', { id: course.id })">
                    <button type="button" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                        <font-awesome-icon icon="fa-solid fa-pen-to-square" /> Edit
                    </button>
                    </Link>

                    <form @submit.prevent="deleteCourse(course.id)">
                        <button type="submit" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1">
                            <font-awesome-icon icon="fa-solid fa-trash" /> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '../Layouts/Layout.vue';
import { del } from '../../Composables/httpMethod';

const props = defineProps({
    igcseCourses: Array,
});

const deleteCourse = (id) => {
    del(route('admin.igcse-courses.destroy', { id }));
};
</script>

<style scoped>
.card-title {
    font-size: 1.1rem;
}
</style>
