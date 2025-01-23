<template>
    <Layout>
      <div class="p-6 bg-[#121212] rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">Tech Stacks</h1>
          <Link 
            :href="route('admin.tech-stacks.create')"
            class="btn-primary"
          >
            Add New
          </Link>
        </div>
  
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="text-left border-b">
                <th class="pb-3">Name</th>
                <th class="pb-3">Category</th>
                <th class="pb-3">Proficiency</th>
                <th class="pb-3">Icon</th>
                <th class="pb-3">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="stack in techStacks" :key="stack.id" class="border-b last:border-0">
                <td class="py-4">{{ stack.name }}</td>
                <td class="py-4">{{ stack.category }}</td>
                <td class="py-4">{{ stack.proficiency }}%</td>
                <td class="py-4">
                    <img v-if="stack.icon_url" 
                        :src="stack.icon_url" 
                        class="h-8 w-8 object-contain">
                </td>
                <td class="py-4 space-x-2">
                  <Link 
                    :href="route('admin.tech-stacks.edit', stack.id)"
                    class="text-blue-600 hover:text-blue-900"
                  >
                    Edit
                  </Link>
                  <Link 
                    method="delete" 
                    :href="route('admin.tech-stacks.destroy', stack.id)"
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
import { Link } from '@inertiajs/vue3'
import Layout from '@/Layouts/Dashboard.vue'
  
defineProps({
    techStacks: Array
})
</script>