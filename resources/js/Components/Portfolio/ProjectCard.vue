<template>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
      <img
        v-if="project.thumbnail"
        :src="project.thumbnail"
        :alt="project.title"
        class="w-full h-48 object-cover"
      />
      <div class="p-6">
        <h3 class="text-xl font-semibold mb-2">{{ project.title }}</h3>
        <p class="text-gray-600 mb-4">{{ project.description }}</p>
        
        <div class="mb-4">
          <h4 class="text-sm font-medium text-gray-500 mb-2">Technologies Used:</h4>
          <div class="flex flex-wrap gap-2">
            <span
                v-for="tech in project.tech_stacks"
                :key="tech.id"
                class="px-2 py-1 bg-gray-100 rounded-full text-sm"
            >
                {{ tech.name }}
            </span>
        </div>
        </div>
        
        <div class="flex gap-4">
          <a
            v-if="project.github_link"
            :href="project.github_link"
            target="_blank"
            class="text-gray-600 hover:text-gray-900"
          >
            GitHub
          </a>
          <a
            v-if="project.live_link"
            :href="project.live_link"
            target="_blank"
            class="text-blue-600 hover:text-blue-800"
          >
            Live Demo
          </a>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  defineProps({
    project: {
      type: Object,
      required: true
    }
  })
  </script>