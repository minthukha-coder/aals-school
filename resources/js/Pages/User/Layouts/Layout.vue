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
    font-family: "Roboto", sans-serif;
}

.content {
    font-family: "Roboto", sans-serif;
}

body {
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    line-height: 1.6;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
}

</style>
