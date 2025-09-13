<template>
    <div class="layout">
        <Navbar />
        <div class="content">
            <slot />
        </div>
        <Footer />
    </div>
</template>

<script setup>
import Navbar from '@/Pages/User/Components/Navbar.vue'
import Footer from '@/Pages/User/Components/Footer.vue'
</script>

<style scoped>
.layout {
    font-family: "Inter", sans-serif;
}

.content {
    font-family: "Inter", sans-serif;
}
</style>
