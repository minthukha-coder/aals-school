<template>
    <div class="card w-full shadow-lg" style="border-radius:10px;">
        <img :src="course?.image" alt="" class="rounded-t-md" style="width:100%;height:220px;object-fit:cover;" />
        <div class="p-2 mx-3">
            <h5 class="text-start my-3 fw-bold text-base">{{ course?.title }}</h5>
            <h6 class="">Duration : {{ course?.duration }}</h6>
        </div>
    </div>

</template>

<script setup>
const props = defineProps({
    course: Object
})

</script>

<style lang="scss" scoped></style>
