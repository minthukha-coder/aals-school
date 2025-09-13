<template>
  <div class="p-6">
    <h2 class="text-xl font-bold mb-4">Search Results for "{{ query }}"</h2>

    <div v-if="results.length > 0">
      <div v-for="item in results" :key="item.id" class="mb-4 p-4 border rounded shadow">
        <h3 class="text-lg font-semibold">{{ item.title }}</h3>
        <p class="text-gray-700">{{ item.body.substring(0,150) }}...</p>
        <Link :href="`/content/${item.id}`" class="text-green-600 font-bold">Read more</Link>
      </div>
    </div>

    <div v-else>
      <p class="text-gray-600">No results found.</p>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  results: Array,
  query: String,
});
</script>

<style lang="scss" scoped>

</style>