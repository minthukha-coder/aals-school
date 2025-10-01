<template>
    <Layout>
        <h5 class="text-center">About Page</h5>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 flex flex-col justify-center mx-auto">

                <div v-if="props.about?.image" style="width:400px; height: 300px;">
                    <img :src="props.about?.image" alt="" class="rounded-lg mb-4 w-100 h-100 object-fit-cover" />
                </div>

                <div>
                    <h3 class="font-bold text-md">{{ props.about?.title }}</h3>
                    <p class="text-md my-3">{{ props.about?.subtitle }}</p>
                    <p class="text-left mt-3">
                        {{ props.about?.description }}
                    </p>
                </div>

                <div v-if="about" class="text-center">
                    <Link :href="route('admin.about.edit')"><button
                        class="btn btn-success btn-sm w-10 my-2 float-end"><font-awesome-icon
                            icon="fa-solid fa-pen-to-square" /></button></Link>
                </div>

                <div v-else class="text-center mt-4">
                    <Link :href="route('admin.about.edit')"><button class="btn btn-success"> <font-awesome-icon
                            icon="fa-solid fa-arrow-up-from-bracket" /> Upload</button></Link>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '../Layouts/Layout.vue';

const props = defineProps({
    about: Object,
});
</script>

<style lang="scss" scoped></style>
