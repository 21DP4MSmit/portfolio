<template>
    <Layout>
      <div class="p-6 bg-white rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">Work Experience</h1>
          <Link 
            :href="route('admin.experience.create')"
            class="btn-primary"
          >
            Add New
          </Link>
        </div>
  
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="text-left border-b">
                <th class="pb-3">Company</th>
                <th class="pb-3">Position</th>
                <th class="pb-3">Duration</th>
                <th class="pb-3">Location</th>
                <th class="pb-3">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="exp in experiences" :key="exp.id" class="border-b last:border-0">
                <td class="py-4">{{ exp.company }}</td>
                <td class="py-4">{{ exp.position }}</td>
                <td class="py-4">
                  {{ exp.start_date }} - {{ exp.end_date || 'Present' }}
                </td>
                <td class="py-4">{{ exp.location }}</td>
                <td class="py-4 space-x-2">
                  <Link 
                    :href="route('admin.experience.edit', exp.id)"
                    class="text-blue-600 hover:text-blue-900"
                  >
                    Edit
                  </Link>
                  <Link 
                    method="delete" 
                    :href="route('admin.experience.destroy', exp.id)"
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
    experiences: Array
})
</script>