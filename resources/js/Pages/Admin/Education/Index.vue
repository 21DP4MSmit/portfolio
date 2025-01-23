<template>
    <Layout>
      <div class="p-6 bg-[#121212] rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">Education</h1>
          <Link 
            :href="route('admin.education.create')"
            class="btn-primary"
          >
            Add New
          </Link>
        </div>
  
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="text-left border-b">
                <th class="pb-3">Institution</th>
                <th class="pb-3">Degree</th>
                <th class="pb-3">Field</th>
                <th class="pb-3">Duration</th>
                <th class="pb-3">Location</th>
                <th class="pb-3">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="edu in educations" :key="edu.id" class="border-b last:border-0">
                <td class="py-4">{{ edu.institution }}</td>
                <td class="py-4">{{ edu.degree }}</td>
                <td class="py-4">{{ edu.field_of_study }}</td>
                <td class="py-4">
                  {{ edu.start_date }} - {{ edu.end_date || 'Present' }}
                </td>
                <td class="py-4">{{ edu.location }}</td>
                <td class="py-4 space-x-2">
                  <Link 
                    :href="route('admin.education.edit', edu.id)"
                    class="text-blue-600 hover:text-blue-900"
                  >
                    Edit
                  </Link>
                  <Link 
                    method="delete" 
                    :href="route('admin.education.destroy', edu.id)"
                    class="text-red-600 hover:text-red-900"
                    preserve-scroll
                    as="button"
                  >
                    Delete
                  </Link>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </Layout>
</template>
  
<script setup>
import { Head, Link } from '@inertiajs/vue3'
import Layout from '@/Layouts/Dashboard.vue'
  
defineProps({
    educations: Array
})
</script>