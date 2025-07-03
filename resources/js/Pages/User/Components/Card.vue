<template>
    <div class="card w-full p-4 shadow-lg" style="border-radius:20px;">
        <img :src="course?.image" alt="" style="width:100%;height:220px;object-fit:cover;" />
        <h4 class="text-start my-3 font-bold">{{ course?.title }}</h4>
        <h5>Duration : {{ course?.duration }} months</h5>
    </div>

</template>

<script setup>
const props = defineProps({
    course : Object
})

</script>

<style lang="scss" scoped></style>
