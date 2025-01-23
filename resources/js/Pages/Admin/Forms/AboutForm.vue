<template>
  <div class="max-w-2xl mx-auto space-y-6 ">
    <div class="flex justify-between items-center border-b pb-4 ">
      <h1 class="text-3xl font-bold text-gray-400">Profile Settings</h1>
    </div>

    <div class="bg-[#121212] rounded-lg shadow-md p-8">
      <form @submit.prevent="submitForm" class="space-y-6">
        <input type="hidden" name="_method" value="PUT">
        <div class="grid grid-cols-1 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Name</label>
            <input
              v-model="form.name"
              type="text"
              class="w-full px-3 py-2 bg-zinc-900 text-gray-200 border border-gray-300 rounded-md shadow-sm 
                     focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                     transition duration-300"
            />
            <p v-if="form.errors.name" class="text-red-500 text-xs mt-1">
              {{ form.errors.name }}
            </p>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Bio</label>
            <textarea
              v-model="form.bio"
              rows="4"
              class="w-full px-3 py-2 bg-zinc-900 text-gray-200 border border-gray-300 rounded-md shadow-sm 
                     focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                     transition duration-300"
            ></textarea>
            <p v-if="form.errors.bio" class="text-red-500 text-xs mt-1">
              {{ form.errors.bio }}
            </p>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Position</label>
            <input
              v-model="form.position"
              type="text"
              class="w-full px-3 py-2 bg-zinc-900 text-gray-200 border border-gray-300 rounded-md shadow-sm 
                     focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                     transition duration-300"
            />
            <p v-if="form.errors.position" class="text-red-500 text-xs mt-1">
              {{ form.errors.position }}
            </p>
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-300">GitHub URL</label>
              <input v-model="form.social_links.github" type="url" 
                    class="mt-1 block w-full rounded-md bg-zinc-800 text-gray-100 border-gray-700"
                    placeholder="https://github.com/yourusername">
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-300">LinkedIn URL</label>
              <input v-model="form.social_links.linkedin" type="url" 
                    class="mt-1 block w-full rounded-md bg-zinc-800 text-gray-100 border-gray-700"
                    placeholder="https://linkedin.com/in/yourprofile">
            </div>
          </div>
        </div>

        <div class="flex justify-end mt-6">
          <button
            type="submit"
            class="px-6 py-2 bg-blue-900 text-white rounded-md 
                   hover:bg-blue-700 focus:outline-none focus:ring-2 
                   focus:ring-blue-500 focus:ring-offset-2 
                   transition duration-300 
                   disabled:opacity-50 disabled:cursor-not-allowed"
            :disabled="form.processing"
          >
            {{ form.processing ? 'Saving...' : 'Save Changes' }}
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import Layout from '@/Layouts/Dashboard.vue';

defineOptions({ layout: Layout });

const props = defineProps({
  about: {
    type: Object,
    required: true
  }
})

const form = useForm({
  name: props.about.name || '',
  bio: props.about.bio || '',
  position: props.about.position || '',
  photo: null,
  social_links: {
    github: props.about.social_links?.github || '',
    linkedin: props.about.social_links?.linkedin || ''
  }
})

const submitForm = () => {
  form.transform((data) => ({
    ...data,
    social_links: JSON.stringify(data.social_links)
  })).put(route('admin.about.update', props.about.id), {
    preserveScroll: true,
    onSuccess: () => {
      form.reset('photo')
    }
  })
}
</script>