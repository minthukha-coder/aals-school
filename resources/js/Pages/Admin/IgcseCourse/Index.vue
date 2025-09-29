<template>
    <Layout>
        <h5 class="text-center">IGCSE Courses Page</h5>
        <Link :href="route('admin.igcse-courses.create')"><button class="btn btn-success float-end">
            <font-awesome-icon icon="fa-solid fa-circle-plus" /> Create
        </button>
        </Link>

        <v-row class="mb-5">
            <v-col cols="12" sm="3" v-for="course in igcseCourses" :key="course.id">
                <v-card :loading="loading" class="border shadow" style="height: 100%">
                    <template v-slot:loader="{ isActive }">
                        <v-progress-linear :active="isActive" color="deep-purple" height="4"
                            indeterminate></v-progress-linear>
                    </template>

                    <div>
                        <v-img v-if="course.image" height="120" :src="course.image" cover
                            class="position-relative"></v-img>
                        <!-- <img class="position-relative" v-else
                            src="../../../images/default-profile-icon-v0-5ieelpg6lu0b1.jpg" style="
                      width: 100%;
                      height: 120px;
                      object-fit: cover;
                      object-position: center;
                    " /> -->

                        <v-card-item>
                            <h5 class="font-bold my-2">{{ course.title }}</h5>
                        </v-card-item>

                        <v-card-text>
                            <v-row align="center" class="mx-0">
                                <div class="my-3 text-xs mr-5">
                                    {{ course.duration }}
                                </div>
                            </v-row>
                            <div class="my-2">{{ course.price_monthly }} per months</div>
                        </v-card-text>
                    </div>

                    <div class="h-100">
                        <Link :href="route('admin.igcse-courses.show', {
                            id: course.id,
                        })
                            ">
                        <v-btn color="#EF4444" variant="text">
                            Details
                        </v-btn>
                        </Link>

                        <div class=" bg-white d-flex justify-content-end gap-3 mb-1">
                            <Link :href="route('admin.igcse-courses.edit', { id: course.id })
                                " class="text-decoration-none">
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

                </v-card>

            </v-col>
        </v-row>
    </Layout>
</template>

<script setup>
import Layout from "@/Pages/Admin/Layouts/Layout.vue";
const props = defineProps({
    igcseCourses: Array,
});

const deleteCourse = (id) => {
    del(route("admin.igcse-courses.destroy", { id: id }));
};
</script>

<style lang="scss" scoped></style>
