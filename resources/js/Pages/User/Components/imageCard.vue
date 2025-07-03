<template>
    <div class="border w-70 h-48 overflow-hidden rounded-2xl shadow-lg ">
        <img :src="image" alt="" class="w-full h-full object-cover" style="height:100%;"/>
    </div>
</template>

<script setup>
defineProps({
    image: String,
});
</script>

<style lang="scss" scoped>

</style>
