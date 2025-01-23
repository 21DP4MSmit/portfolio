<template>
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Project Image -->
    <div class="relative w-full h-[280px] bg-gray-800 rounded-lg overflow-hidden">
      <img
        v-if="project.thumbnail"
        :src="project.thumbnail"
        :alt="project.title"
        class="w-full h-full object-cover"
      />
    </div>

    <!-- Project Info -->
    <div class="bg-[#1a1a1a] rounded-lg p-6 animate-slideDownFromSelf">
      <h2 class="text-2xl font-bold text-white mb-4">{{ project.title }}</h2>
      <p class="text-gray-400 mb-6">{{ project.description }}</p>

      <!-- Tech Stack Tags -->
      <div class="flex flex-wrap gap-2">
        <span
          v-for="tech in project.tech_stacks"
          :key="tech.id"
          class="px-3 py-1 bg-gray-700 text-gray-200 rounded-md text-sm"
        >
          {{ tech.name }}
        </span>
      </div>

      <!-- Project Link -->
      <div v-if="project.live_link" class="mt-6">
        <a
          :href="project.live_link"
          target="_blank"
          class="inline-flex items-center text-white hover:text-gray-300 transition-colors"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
            />
          </svg>
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