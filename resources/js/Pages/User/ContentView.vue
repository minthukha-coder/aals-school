<template>

    <Head title="Search - Aung Academy Language School" />

    <Layout>
        <div class="container p-5">
            <div v-if="content" class="rounded shadow">
                <div class="p-3">
                    <h2 class="text-2xl font-bold mb-4 text-green-700">{{ content.title }}</h2>
                    <p class="text-gray-700 leading-relaxed mb-6">{{ content.body }}</p>
                </div>

            </div>
            <div v-else>
                <p class="text-gray-600">Content not found.</p>
            </div>
        </div>

    </Layout>
</template>

<script setup>
import Layout from './Layouts/Layout.vue'
import { Head } from '@inertiajs/vue3'

const props = defineProps({
    content: Object
})
</script>
