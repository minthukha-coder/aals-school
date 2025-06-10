<template>
    <div class="">
      <Header @toggleSidebar="toggleSidebar" />
      <Sidebar :isCollapsed="isSidebarCollapsed" />

      <div class="content" :class="{ 'sidebar-collapsed': isSidebarCollapsed }">
        <slot />
      </div>
    </div>
</template>

  <script>
  import Header from '../Components/Header.vue';
  import Sidebar from '../Components/Sidebar.vue';

  export default {
    components: {
      Header,
      Sidebar
    },
    data() {
      return {
        isSidebarCollapsed: false
      };
    },
    methods: {
      toggleSidebar() {
        this.isSidebarCollapsed = !this.isSidebarCollapsed;
      }
    }
  };
  </script>

  <style scoped>
  .content {
    margin-left: 250px;
    padding: 20px;
    transition: margin-left 0.3s;
  }
  .sidebar-collapsed .content {
    margin-left: 80px;
  }
  </style>
