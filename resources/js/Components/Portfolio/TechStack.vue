<template>
    <section class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-8">Tech Stack</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div
            v-for="tech in techStacks"
            :key="tech.id"
            class="bg-white rounded-lg shadow p-6 flex items-center"
          >
            <img
              :src="tech.icon"
              alt="Tech Icon"
              class="h-12 w-12 object-contain mr-4"
            />
            <div>
              <h3 class="text-xl font-semibold">{{ tech.name }}</h3>
              <p class="text-gray-600">{{ tech.category }}</p>
              <p class="text-gray-500 text-sm">Proficiency: {{ tech.proficiency }}%</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  defineProps({
    techStacks: {
      type: Array,
      required: true,
    },
  });
  </script>
  