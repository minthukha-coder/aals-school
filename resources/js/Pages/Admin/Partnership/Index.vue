<template>
    <div>
        <Layout>
            <h5 class="text-center">Partnership Page</h5>
            <div class="row">
                <Link :href="route('admin.partnerships.create')"><button class="btn btn-success float-end"><font-awesome-icon icon="fa-solid fa-circle-plus" /> Upload</button></Link>

                <div v-if="partnership" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div
                        class="bg-white rounded shadow p-4 hover:shadow-lg transition">
                        <div class="flex space-x-2 mb-3">
                            <img :src="partnership?.image1" alt="Image 1" class="w-1/2 h-32 object-cover rounded" />
                            <img :src="partnership?.image2" alt="Image 2" class="w-1/2 h-32 object-cover rounded" />
                        </div>
                        <h2 class="font-semibold text-lg mb-1">{{ partnership?.title }}</h2>
                        <p class="text-sm text-gray-600">{{ partnership?.description }}</p>

                           <div class="card-footer bg-white d-flex justify-content-end gap-3 border-top">
                            <Link :href="route('admin.partnerships.edit', {id : partnership?.id})" class="text-decoration-none">
                            <button type="button"
                                class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1">
                                <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                                Edit
                            </button>
                            </Link>

                            <form @submit.prevent="deletePartnership(partnership?.id)">
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
import Layout from "../Layouts/Layout.vue";

const props = defineProps({
    partnership: Object,
});

const deletePartnership = (id) => {
    del(route('admin.partnerships.destroy', { id: id }));
};
</script>

<style lang="scss" scoped></style>
