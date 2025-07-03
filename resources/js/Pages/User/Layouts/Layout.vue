<template>
    <div>
        <Navbar />
        <slot />
        <Footer />
    </div>
</template>

<script setup>
import Navbar from '@/Pages/User/Components/Navbar.vue'
import Footer from '@/Pages/User/Components/Footer.vue'
</script>

<style lang="scss" scoped></style>
