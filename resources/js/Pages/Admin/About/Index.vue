<template>
    <Layout>
        <h5 class="text-center">About Page</h5>
         <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 flex flex-col justify-center mx-auto">
                <div>
                    <img :src="props.about?.image" alt="">
                </div>

                <div v-if="about" class="text-center">
                    <Link :href="route('admin.home.edit')"><button
                        class="btn btn-primary btn-sm w-25 my-2 float-end">Edit</button></Link>
                </div>

                <div v-else class="text-center mt-4">
                    <Link :href="route('admin.about.edit')"><button class="btn btn-success"> <font-awesome-icon icon="fa-solid fa-arrow-up-from-bracket" /> Upload</button></Link>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '../Layouts/Layout.vue';
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    about: Object,
});
</script>

<style lang="scss" scoped></style>