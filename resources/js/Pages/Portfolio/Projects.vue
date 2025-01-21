<template>
    <layout>
      <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-8">Projects</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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