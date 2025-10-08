<template>
    <Layout>
        <div id="contact-us" class="pb-3">
            <p class="text-5xl text-center fw-bold my-4">About Us</p>

            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="flex justify-center md:justify-start ">
                    <img :src="about?.image" alt="About Image" class="object-cover"
                        style="max-width: 100%; height: 400px;" />
                </div>

                <div
                    class="text-center md:!text-start md:mt-0 pt-5 flex flex-col justify-center items-center md:!items-start">
                    <h2 class="font-bold text-xl my-2">{{ about?.title }}</h2>

                    <p class="text-lg my-3">{{ about?.subtitle }}</p>
                    <p>
                        {{ about?.description }}
                    </p>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";

const props = defineProps({
    about: Object,
});
</script>

<style lang="scss" scoped></style>
