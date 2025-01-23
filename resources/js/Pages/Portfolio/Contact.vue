<template>
  <layout>
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-24">
        <!-- Email Card -->
        <div class="bg-[#1a1a1a] rounded-lg p-6 flex items-center space-x-4 animate-slideLeftFromSelf animate-fill-backwards">
          <div class="p-2 bg-gray-800 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <a :href="`mailto:${about.email}`" class="text-gray-300 hover:text-white transition-colors">
            matiss.smits04@gmail.com
          </a>
        </div>

        <!-- LinkedIn Card -->
        <a 
          :href="about.social_links.linkedin" 
          target="_blank" 
          rel="noopener noreferrer" 
          class="block bg-[#1a1a1a] rounded-lg p-6 flex items-center justify-center hover:bg-[#333333] transition animate-slideRightFromSelf"
        >
          <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor">
            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
          </svg>
        </a>

        <!-- GitHub Profile Card -->
        <a 
          :href="about.social_links.github" 
          target="_blank" 
          rel="noopener noreferrer" 
          class="block bg-[#1a1a1a] rounded-lg p-6 md:col-span-2 hover:bg-[#333333] transition animate-slideDownFromSelf"
        >
          <div class="flex flex-col items-center space-y-4">
            <svg class="h-12 w-12 text-white" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
            </svg>
            <h3 class="text-xl font-semibold text-white">GitHub Profile</h3>
            <p class="text-gray-400">Find more of my repositories</p>
          </div>
        </a>
      </div>
    </div>
  </layout>
</template>
  
<script setup>
import Layout from '@/Layouts/PortfolioLayout.vue'
  
defineProps({
    about: {
      type: Object,
      required: true,
      default: () => ({
        email: '',
        social_links: {
          github: '',
          linkedin: ''
        }
      })
    }
})
</script>