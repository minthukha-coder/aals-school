<template>
    <div>
        <Layout>
            <h5 class="text-center">Additional Courses Page</h5>
            <div class="row">
                <Link :href="route('admin.additional-courses.create')"><button class="btn btn-primary">Create</button></Link>

                     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-3">
                    <div v-for="course in courses" :key="course.id" class="card mb-4 shadow rounded overflow-hidden">
                        <img :src="course?.image" class="card-img-top" alt="Course Image"
                            style="height: 200px; object-fit: cover;" />

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ course.title }}</h5>
                            <p class="card-text text-muted">{{ course.duration }}</p>
                        </div>

                        <div class="card-footer bg-white d-flex justify-content-end gap-3 border-top">
                            <Link :href="route('admin.additional-courses.edit', {id : course.id})" class="text-decoration-none">
                            <button type="button"
                                class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                                <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                                Edit
                            </button>
                            </Link>

                            <form @submit.prevent="deleteCourse(course.id)">
                                <button type="submit"
                                    class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1">
                                    <font-awesome-icon icon="fa-solid fa-trash" />
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </Layout>
    </div>
</template>

<script setup>
import Layout from '../Layouts/Layout.vue';
import { del } from '../../Composables/httpMethod';
const props = defineProps({
    courses: Array,
});

const deleteCourse = (id) => {
    del(route('admin.additional-courses.destroy', {id : id}));
};
</script>

<style lang="scss" scoped></style>
