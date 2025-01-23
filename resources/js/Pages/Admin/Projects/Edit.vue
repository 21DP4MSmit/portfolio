<template>
    <Layout>
        <div class="max-w-4xl mx-auto p-8 bg-[#121212] rounded-2xl shadow-lg border border-gray-100">
        <h1 class="text-3xl font-extrabold mb-8 text-gray-400 border-b pb-4">Edit Project</h1>
        
        <form @submit.prevent="submit" class="space-y-8">
            <div>
            <label class="block text-md font-semibold  text-gray-400 mb-2">Title</label>
            <input v-model="form.title" type="text" class="w-full px-4 py-3 bg-zinc-900 text-gray-200 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
            <p v-if="form.errors.title" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.title }}</p>
          </div>
  
          <div>
            <label class="block text-md font-semibold text-gray-400 mb-2">Description</label>
            <textarea 
              v-model="form.description" 
              rows="4" 
              class="w-full px-4 py-3 bg-zinc-900 text-gray-200 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
            ></textarea>
            <p v-if="form.errors.description" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.description }}</p>
          </div>

          <div>
            <label class="block text-md font-semibold text-gray-400 mb-2">Thumbnail</label>
            <div class="flex items-center space-x-4">
              <img v-if="project.thumbnail_url" :src="project.thumbnail_url" 
                   class="h-12 w-12 object-contain border rounded p-1">
              <input 
                type="file" 
                @input="form.thumbnail = $event.target.files[0]"
                class="border p-2 rounded-md text-gray-200 file:mr-4 file:rounded-md file:border-0 file:bg-zinc-900 file:px-4 file:py-2 file:text-blue-700 hover:file:bg-blue-100"
                accept="image/png, image/jpeg, image/svg+xml"
              >
            </div>
            <p v-if="form.errors.thumbnail" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.thumbnail }}</p>
          </div>
  
          <div>
            <label class="block text-md font-semibold text-gray-400 mb-2">Tech Stacks</label>
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
                  v-if="stack.icon_url" 
                  :src="stack.icon_url" 
                  class="h-8 w-8 object-contain"
                  :alt="stack.name"
                >
                <span
                    class="text-sm font-medium"
                    :class="form.tech_stacks.includes(stack.id) 
                    ? 'text-blue-900' 
                    : 'text-gray-200'"
                >
                    {{ stack.name }}
                </span>
                </label>
            </div>
          </div>
  
          <div class="grid grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-400">GitHub Link</label>
              <input v-model="form.github_link" type="url" class="mt-1 block w-full rounded-md bg-zinc-900  border-gray-300 shadow-sm">
              <p v-if="form.errors.github_link" class="text-red-500 text-sm mt-1">{{ form.errors.github_link }}</p>
            </div>
  
            <div>
              <label class="block text-sm font-medium text-gray-400">Live Link</label>
              <input v-model="form.live_link" type="url" class="mt-1 block w-full rounded-md bg-zinc-900 border-gray-300 shadow-sm">
              <p v-if="form.errors.live_link" class="text-red-500 text-sm mt-1">{{ form.errors.live_link }}</p>
            </div>
          </div>
  
          <div class="flex justify-end space-x-4">
            <Link :href="route('admin.projects.index')" class="btn-secondary">
              Cancel
            </Link>
            <button type="submit" class="btn-primary" :disabled="form.processing">
              Update
            </button>
          </div>
        </form>
      </div>
    </Layout>
</template>
  
<script setup>
import { useForm, Link, router } from '@inertiajs/vue3';
import Layout from '@/Layouts/Dashboard.vue'

const props = defineProps({
    project: Object,
    techStacks: Array
})
  
const form = useForm({
    title: props.project.title,
    description: props.project.description,
    thumbnail: null,
    github_link: props.project.github_link,
    live_link: props.project.live_link,
    tech_stacks: props.project.tech_stacks || []
})
  
const submit = () => {
    form.transform((data) => ({
        ...data,
        _method: 'PUT'
    })).post(route('admin.projects.update', props.project.id), {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => router.visit(route('admin.projects.index')),
        onError: (errors) => console.error('Update failed:', errors)
    })
}
</script>