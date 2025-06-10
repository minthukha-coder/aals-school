<template>
    <div class="card w-full p-4 shadow-lg" style="border-radius:20px;">
        <img src="../images/home.jpg" alt="">
        <h4 class="text-center my-3 font-bold">{{ title }}</h4>
    </div>

</template>

<script setup>
const props = defineProps({
    title : String
})

</script>

<style lang="scss" scoped></style>