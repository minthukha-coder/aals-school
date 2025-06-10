<template>
    <li class="nav-item">
      <Link
        :href="href"
        class="nav-link d-flex align-items-center px-3 py-2"
        :class="{ active }"
      >
        <i :class="icon" class="me-2"></i>
        <span>{{ text }}</span>
      </Link>
    </li>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3'
  
  defineProps({
    icon: String,
    text: String,
    href: String,
    active: Boolean
  })
  </script>
  
  <style scoped>
  .nav-link {
    color: #fff;
    transition: background-color 0.3s ease;
    border-radius: 5px;
  }
  
  .nav-link:hover {
    background-color: #1f2937;
  }
  
  .nav-link.active {
    background-color: #06d6a0;
    color: #000;
  }
  </style>
  