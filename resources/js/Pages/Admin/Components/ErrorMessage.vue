<template>
    <span v-if="text" class="text-red-500 text-xs">{{ text }}</span>
</template>

<script setup>
defineProps({
    text : String
})
</script>

<style>

</style>
