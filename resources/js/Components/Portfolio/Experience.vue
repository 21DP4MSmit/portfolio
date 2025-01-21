<template>
    <section class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-8">Work Experience</h2>
        <div class="space-y-8">
          <div
            v-for="job in experience"
            :key="job.id"
            class="bg-white rounded-lg shadow p-6"
          >
            <div class="flex justify-between items-start">
              <div>
                <h3 class="text-xl font-semibold">{{ job.position }}</h3>
                <p class="text-lg text-gray-600">{{ job.company }}</p>
              </div>
              <div class="text-gray-500">
                {{ formatDate(job.start_date) }} - {{ job.is_current ? 'Present' : formatDate(job.end_date) }}
              </div>
            </div>
            <p class="mt-4 text-gray-600">{{ job.description }}</p>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  import { formatDate } from '@/utils/dates';
  
  defineProps({
    experience: {
      type: Array,
      required: true,
    },
  });
  </script>
  