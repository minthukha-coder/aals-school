<template>

    <Head title="Learning Pathway - Aung Academy Language School" />

    <Layout>
        <div class="container my-3 text-center">
            <h3 class="my-3 fw-bold text-4xl md:text-5xl lg:text-5xl">Learning Pathway</h3>

            <div class="grid grid-cols-1 gap-3 my-2">
                <img src="../User/images/learning-pathway1.jpg" alt="" class="w-full h-full object-cover rounded-md"
                    style="height:100%" />
            </div>

            <div class="grid grid-cols-1 gap-3">
                <img src="../User/images/learning-pathway2.jpg" alt="" class="w-full h-full object-cover rounded-md"
                    style="height:100%" />
            </div>

        </div>
    </Layout>
</template>

<script setup>
import Layout from './Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3'

</script>

<style lang="scss" scoped></style>
