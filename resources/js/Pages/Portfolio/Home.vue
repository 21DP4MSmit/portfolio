<template>
  <layout>
    <div class="grid grid-cols-3 grid-rows-3 gap-4 p-4">
      <div class="col-span-2 row-start-1 bg-[#1a1a1a] rounded-lg p-4 animate-slideInLeft">
        <h2 class="text-2xl font-bold text-white mb-2">Who am I?</h2>
        <p class="text-gray-300">{{ about.bio }}</p>
      </div>

      <!-- Education -->
      <div class="col-start-3 row-span-2 bg-teal-800 rounded-lg p-4 animate-slideInDown">
        <h2 class="text-2xl font-bold text-white mb-2">Education</h2>
        <div class="space-y-2">
          <div v-for="entry in education" :key="entry.id" class="text-white">
            <h3 class="font-semibold">{{ entry.institution }}</h3>
            <p class="text-sm text-gray-300">
              ({{ formatDate(entry.start_date) }} - {{ entry.end_date ? formatDate(entry.end_date) : 'Today' }})
            </p>
            <p class="text-sm text-gray-300">{{ entry.degree }}</p>
          </div>
        </div>
      </div>

      <!-- Tech -->
      <div class="col-start-1 row-start-2 row-span-2 bg-[#1a1a1a] rounded-lg p-4 animate-slideInUp">
        <h2 class="text-2xl font-bold text-white mb-2">Technologies I have worked with</h2>
        <div class="grid grid-cols-4 gap-2">
          <div v-for="tech in techStacks" :key="tech.id" class="flex items-center justify-center">
            <img :src="tech.icon" :alt="tech.name" class="h-8 w-8 object-contain" />
          </div>
        </div>
      </div>

      <!-- Profile -->
      <div class="col-start-2 row-start-2 bg-[#1a1a1a] rounded-lg p-4 flex flex-col items-center justify-center">
        <img
          :src="about.photo"
          :alt="about.name"
          class="h-16 w-16 rounded-full mb-2"
        />
        <h2 class="text-2xl font-bold text-blue-400">{{ about.name }}</h2>
      </div>

      <!-- Work Experience -->
      <div class="col-start-2 col-span-2 row-start-3 bg-[#1a1a1a] rounded-lg p-4 animate-slideInRight">
        <h2 class="text-2xl font-bold text-white mb-2">Work Experience</h2>
        <div class="space-y-2">
          <div v-for="job in experience" :key="job.id" class="text-gray-300">
            <div class="flex justify-between">
              <h3 class="font-semibold">{{ job.position }}</h3>
              <span class="text-sm">
                {{ formatDate(job.start_date) }} - {{ job.is_current ? 'Present' : formatDate(job.end_date) }}
              </span>
            </div>
            <p class="text-sm">{{ job.company }}</p>
            <p class="text-sm mt-1">{{ job.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import Layout from '@/Layouts/PortfolioLayout.vue'
import { formatDate } from '@/utils/dates'

defineProps({
  about: Object,
  techStacks: Array,
  education: Array,
  experience: Array
})
</script>