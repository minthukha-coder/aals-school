<template>
    <div>
        <Layout>
            <h5 class="text-center">Partnership Page</h5>
            <div class="row">
                <Link :href="route('admin.partnership.create')"><button class="btn btn-primary">Upload</button></Link>

            </div>
        </Layout>
    </div>
</template>

<script setup>
import Layout from '../Layouts/Layout.vue';
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    courses: Array,
});
</script>

<style lang="scss" scoped></style>