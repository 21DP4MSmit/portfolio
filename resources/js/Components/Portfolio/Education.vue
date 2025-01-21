<template>
    <section class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-8">Education</h2>
        <div class="space-y-8">
          <div
            v-for="entry in education"
            :key="entry.id"
            class="bg-white rounded-lg shadow p-6"
          >
            <div class="flex justify-between items-start">
              <div>
                <h3 class="text-xl font-semibold">{{ entry.degree }}</h3>
                <p class="text-lg text-gray-600">
                  {{ entry.institution }}
                </p>
                <p class="text-sm text-gray-500">
                  {{ entry.field_of_study }}
                </p>
              </div>
              <div class="text-gray-500">
                {{ formatDate(entry.start_date) }} - {{ entry.end_date ? formatDate(entry.end_date) : 'Present' }}
              </div>
            </div>
            <p v-if="entry.description" class="mt-4 text-gray-600">
              {{ entry.description }}
            </p>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  import { formatDate } from '@/utils/dates';
  
  defineProps({
    education: {
      type: Array,
      required: true,
    },
  });
  </script>
  ``
  