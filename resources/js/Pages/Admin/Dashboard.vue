<template>
    <admin-layout>
      <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <stats-card
            title="Projects"
            :count="stats.projectsCount"
            icon="folder"
            to="/admin/projects"
          />
          <stats-card
            title="Tech Stacks"
            :count="stats.techStacksCount"
            icon="code"
            to="/admin/tech-stacks"
          />
          <stats-card
            title="Profile Views"
            :count="stats.viewsCount"
            icon="eye"
          />
        </div>
      </div>
    </admin-layout>
  </template>
  
  <script setup>
  import { defineProps } from 'vue'
  import AdminLayout from '@/Layouts/AdminLayout.vue'
  import StatsCard from '@/Components/Admin/StatsCard.vue'
  
  defineProps({
    stats: Object
  })
  </script>