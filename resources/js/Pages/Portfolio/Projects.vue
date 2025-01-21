// Projects.vue
<template>
  <layout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <div class="space-y-12">
        <project-card
          v-for="project in projects"
          :key="project.id"
          :project="project"
        />
      </div>
    </div>
  </layout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import Layout from '@/Layouts/PortfolioLayout.vue'
import ProjectCard from '@/Components/Portfolio/ProjectCard.vue'

defineProps({
  projects: Array
})
</script>