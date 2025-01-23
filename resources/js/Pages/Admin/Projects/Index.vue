<template>
    <Layout>
      <div class="p-6 bg-white rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">Projects</h1>
          <Link 
            :href="route('admin.projects.create')"
            class="btn-primary"
          >
            Add New
          </Link>
        </div>
  
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="text-left border-b">
                <th class="pb-3">Title</th>
                <th class="pb-3">Description</th>
                <th class="pb-3">Thumbnail</th>
                <th class="pb-3">Tech Stacks</th>
                <th class="pb-3">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="project in projects" :key="project.id" class="border-b last:border-0">
                <td class="py-4">{{ project.title }}</td>
                <td class="py-4 max-w-xs truncate">{{ project.description }}</td>
                <td class="py-4">
                  <img v-if="project.thumbnail_url" :src="project.thumbnail_url" class="h-12 w-12 object-cover rounded">
                </td>
                <td class="py-4">
                    <div class="flex flex-wrap gap-2 items-center">
                        <img 
                        v-for="stack in project.tech_stacks" 
                        :key="stack.id" 
                        :src="stack.icon_url" 
                        :alt="stack.name"
                        class="h-6 w-6 object-contain"
                        :title="stack.name"
                        >
                    </div>
                </td>
                <td class="py-4 space-x-2">
                  <Link 
                    :href="route('admin.projects.edit', project.id)"
                    class="text-blue-600 hover:text-blue-900"
                  >
                    Edit
                  </Link>
                  <Link 
                    method="delete" 
                    :href="route('admin.projects.destroy', project.id)"
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
projects: Array
  })
</script>