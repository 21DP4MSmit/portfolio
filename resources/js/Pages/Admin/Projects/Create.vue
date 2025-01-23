<template>
    <Layout>
        <div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-100">
        <h1 class="text-3xl font-extrabold mb-8 text-gray-800 border-b pb-4">Edit Project</h1>
        
        <form @submit.prevent="submit" class="space-y-8">
            <div>
            <label class="block text-md font-semibold text-gray-700 mb-2">Title</label>
            <input v-model="form.title" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
            <p v-if="form.errors.title" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.title }}</p>
          </div>
  
          <div>
            <label class="block text-md font-semibold text-gray-700 mb-2">Description</label>
            <textarea 
              v-model="form.description" 
              rows="4" 
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
            ></textarea>
            <p v-if="form.errors.description" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.description }}</p>
          </div>
  
          <div>
            <label class="block text-md font-semibold text-gray-700 mb-2">Tech Stacks</label>
            <div class="grid grid-cols-4 gap-4 mt-3">
                <label 
                v-for="stack in techStacks" 
                :key="stack.id" 
                class="flex items-center space-x-3 p-3 border rounded-lg cursor-pointer transition duration-200 hover:bg-blue-50"
                :class="form.tech_stacks.includes(stack.id) 
                    ? 'bg-blue-100 border-blue-500 shadow-sm' 
                    : 'border-gray-300 hover:border-blue-300'"
                >
                <input 
                    type="checkbox" 
                    :value="stack.id"
                    v-model="form.tech_stacks"
                    class="hidden"
                />
                <img 
                    :src="stack.icon_url" 
                    :alt="stack.name" 
                    class="h-8 w-8 object-contain"
                />
                <span 
                    class="text-sm font-medium"
                    :class="form.tech_stacks.includes(stack.id) 
                    ? 'text-blue-700' 
                    : 'text-gray-700'"
                >
                    {{ stack.name }}
                </span>
                </label>
            </div>
          </div>
  
          <div class="grid grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700">GitHub Link</label>
              <input v-model="form.github_link" type="url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
              <p v-if="form.errors.github_link" class="text-red-500 text-sm mt-1">{{ form.errors.github_link }}</p>
            </div>
  
            <div>
              <label class="block text-sm font-medium text-gray-700">Live Link</label>
              <input v-model="form.live_link" type="url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
              <p v-if="form.errors.live_link" class="text-red-500 text-sm mt-1">{{ form.errors.live_link }}</p>
            </div>
          </div>
  
          <div class="flex justify-end space-x-4">
            <Link :href="route('admin.projects.index')" class="btn-secondary">
              Cancel
            </Link>
            <button type="submit" class="btn-primary" :disabled="form.processing">
              Create
            </button>
          </div>
        </form>
      </div>
    </Layout>
</template>
  
<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import Layout from '@/Layouts/Dashboard.vue'
  
defineProps({
    techStacks: Array
})
  
const form = useForm({
    title: '',
    description: '',
    thumbnail: null,
    github_link: '',
    live_link: '',
    tech_stacks: []
})
  
const submit = () => {
    form.post(route('admin.projects.store'))
}
</script>