<template>
    <nav class="navbar navbar-expand-lg navbar-light" :style="{ backgroundColor: 'var(--theme-color)' }">
        <div class="container-fluid">
            <img src="../../Admin/images/logo.jpg" alt="Logo" class="rounded-full" style="width: 50px;height:50px;" />
            <h4 class="text-white">Admin Dashboard</h4>
            <div>
                Logout
            </div>
        </div>
    </nav>
</template>

<script setup>
import {ref,onMounted} from "vue"

</script>

<style scoped>
.navbar {
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
z-index: 50;
position: sticky;
top: 0;
background-color: white; 
}


</style>
