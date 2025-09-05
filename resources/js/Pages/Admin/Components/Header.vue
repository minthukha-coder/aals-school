<template>
    <nav class="navbar navbar-expand-lg navbar-light" :style="{ backgroundColor: 'var(--theme-color)' }">
        <div class="container-fluid">
            <div class="flex items-center">
               <img src="../../Admin/images/logo.jpg" alt="Logo" class="rounded-full" style="width: 50px;height:50px;" />
                <div class="mx-2 text-white">
                    <h5 class="text-sm">AALS</h5>
                </div>
            </div>
            <div class="flex justify-center items-center">
                <div class="dropdown">
                    <a class=" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <font-awesome-icon icon="fa-solid fa-user" class="text-white text-xl mr-4" />
                        <span class="text-white mr-4 text-lg">Logout</span>
                    </a>

                    <ul class="dropdown-menu mr-12">
                        <li>
                             <a :href="route('profile')" class="dropdown-item" @click.prevent="profile">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item" @click.prevent="logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref, onMounted } from "vue"
import { router } from "@inertiajs/vue3";

const logout = () => {
  router.visit("/login");
};

const profile = () => {
  router.visit("/profile");
};
</script>

<style scoped>
.navbar {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 50;
    position: sticky;
    top: 0;
    background-color: white;
}

.dropdown-toggle {
  text-decoration: none !important;
}

</style>
