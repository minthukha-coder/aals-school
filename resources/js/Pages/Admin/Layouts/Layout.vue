<template>
  <div class="layout">
    <Header />
    <div class="main">
      <div class="sidebar">
        <Sidebar />
      </div>
      <div class="right-content p-4">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
import Header from '../Components/Header.vue';
import Sidebar from '../Components/Sidebar.vue';
export default {
  components: { Header, Sidebar }
};
</script>

<style scoped>
.layout {
  display: flex;
  flex-direction: column;
  height: 100vh;
}

/* The main area below the Header */
.main {
  display: flex;
  flex: 1;
  overflow: hidden;
}

.sidebar {
  width: 20%;
  height: 100%;
  overflow-y: auto;
  border:1px solid #ccc;
  box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
}

.right-content {
  width: 83%;
  height: 100%;
  overflow-y: auto;
}
</style>
