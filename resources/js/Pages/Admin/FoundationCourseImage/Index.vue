<template>
    <Layout>
        <h5 class="text-center">Foundation Course Cover</h5>
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8 flex flex-col justify-center mx-auto">
                <div v-if="foundationCourseImage">
                    <img :src="foundationCourseImage?.name" alt="" class="w-100 rounded-lg shadow">
                </div>

                <div v-if="foundationCourseImage" class="text-center">
                    <Link :href="route('admin.foundation-course-images.edit')">
                        <button class="btn btn-success btn-sm w-10 my-2 float-end">
                            <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                        </button>
                    </Link>
                </div>

                <div v-else class="text-center mt-4">
                    <Link :href="route('admin.foundation-course-images.edit')">
                        <button class="btn btn-success">
                            <font-awesome-icon icon="fa-solid fa-arrow-up-from-bracket" /> Upload
                        </button>
                    </Link>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '../Layouts/Layout.vue';

const props = defineProps({
    foundationCourseImage: Object,
});
</script>

<style lang="scss" scoped></style>
