<template>
    <div>
        <Layout>
            <h5 class="text-center">Gallery Page</h5>

            <div class="row">
                <Link :href="route('admin.gallery.create')">
                <button class="btn btn-success float-end">
                    <font-awesome-icon icon="fa-solid fa-circle-plus" /> Create
                </button>
                </Link>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-3 mt-3">
                    <div v-for="gallery in galleries" :key="gallery.id"
                        class="card mb-4 shadow rounded overflow-hidden">
                        <img :src="gallery?.image" class="card-img-top" alt="Gallery Image"
                            style="height: 250px; object-fit: cover;" />

                        <div class="card-footer bg-white d-flex justify-content-end border-top">
                            <form @submit.prevent="deleteImage(gallery.id)">
                                <button type="submit"
                                    class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1">
                                    <font-awesome-icon icon="fa-solid fa-trash" />
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <div v-if="gallery?.length == 0" class="text-center col-span-3 py-5 text-muted">
                        No images found in the gallery.
                    </div>
                </div>
            </div>
        </Layout>
    </div>
</template>

<script setup>
import Layout from '../Layouts/Layout.vue';
import { Link } from '@inertiajs/vue3';
import { del } from '../../Composables/httpMethod';

const props = defineProps({
    galleries: Array,
});

const deleteImage = (id) => {
    del(route('admin.gallery.destroy', { id }));
};
</script>

<style scoped></style>
