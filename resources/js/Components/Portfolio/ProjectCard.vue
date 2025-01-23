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
      <div v-else class="w-full h-full bg-gray-700 flex items-center justify-center">
        <span class="text-gray-400">No thumbnail available</span>
      </div>
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
      <div class="mt-6 flex gap-4">
        <!-- GitHub Link -->
        <a
          v-if="project.github_link"
          :href="project.github_link"
          target="_blank"
          rel="noopener noreferrer"
          class="inline-flex items-center px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-md transition-colors duration-200"
        >
          <svg 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-5 w-5 mr-2" 
            viewBox="0 0 24 24"
            fill="currentColor"
          >
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
          </svg>
          GitHub
        </a>

        <!-- Live Link -->
        <a
          v-if="project.live_link"
          :href="project.live_link"
          target="_blank"
          rel="noopener noreferrer"
          class="inline-flex items-center px-4 py-2 bg-zinc-700 hover:bg-zinc-400 rounded-md transition-colors duration-200"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5 mr-2"
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