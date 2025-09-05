<template>
    <Layout>
        <div id="contact-us" class="pb-3">
            <h4 class="text-center fw-bold">About Us</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 mt-5">
                    <div class="px-5">
                        <img :src="about?.image" alt="" class="" />
                    </div>
                    <div class="text-center md:!text-start mt-3 md:mt-0 p-2">
                        <h2 class="font-bold text-xl">{{ about?.title }}</h2>
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