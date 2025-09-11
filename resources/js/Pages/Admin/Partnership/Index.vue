<template>
    <div>
        <Layout>
            <h5 class="text-center">Partnership Page</h5>
            <div class="row ">
                <!-- <Link :href="route('admin.partnerships.create')"><button class="btn btn-success float-end"><font-awesome-icon icon="fa-solid fa-circle-plus" /> Upload</button></Link> -->

                <div class="grid gap-4">
                    <div class="bg-white rounded shadow p-4 hover:shadow-lg transition">
                        <div class="flex space-x-2 mb-3">
                            <img :src="partnership?.image1"
                                class="w-1/2 h-32 object-cover rounded px-2" />
                            <img :src="partnership?.image2"
                                class="w-1/2 h-32 object-cover rounded px-2" />
                        </div>
                        <h2 class="font-semibold text-lg mb-1">{{ partnership?.title }}</h2>
                        <p class="text-sm text-gray-600">{{ partnership?.description }}</p>

                    </div>
                </div>
                <div v-if="partnership" class="text-center">
                    <Link :href="route('admin.partnerships.edit', { id: partnership?.id })">
                    <button type="button" class="btn btn-success btn-sm w-10 my-2 float-end">
                        <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                    </button>
                    </Link>
                </div>

                 <div v-else class="text-center mt-4">
                    <Link :href="route('admin.partnerships.create')"><button class="btn btn-success"> <font-awesome-icon icon="fa-solid fa-arrow-up-from-bracket" /> Upload</button></Link>
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
