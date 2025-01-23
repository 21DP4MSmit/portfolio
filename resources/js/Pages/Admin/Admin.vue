<template>
    <div>
      <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
      <p>Welcome to the admin panel. Use the sidebar to navigate.</p>
    </div>
  </template>
  
  <script setup>

  import Layout from '@/Layouts/Dashboard.vue';
  defineOptions({ layout: Layout });
  </script>