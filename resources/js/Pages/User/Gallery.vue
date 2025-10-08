<template>
    <Layout>

        <div class="container my-3 text-center">
            <p class="text-5xl font-bold my-5">Gallery</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 my-3">
                <div v-for="gallery in galleries" :key="gallery.id">
                    <img :src="gallery?.image" alt="" class="w-full object-cover rounded-md"
                        style="height:280px;object-fit:cover;" />
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from './Layouts/Layout.vue';

const props = defineProps({
    galleries: Object,
});
</script>

<style lang="scss" scoped></style>
