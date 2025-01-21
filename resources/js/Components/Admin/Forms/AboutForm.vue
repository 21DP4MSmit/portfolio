<template>
    <form @submit.prevent="submit" class="space-y-6">
      <div>
        <label class="block text-sm font-medium text-gray-700">Name</label>
        <input
          v-model="form.name"
          type="text"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
        />
      </div>
      
      <div>
        <label class="block text-sm font-medium text-gray-700">Bio</label>
        <textarea
          v-model="form.bio"
          rows="4"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
        ></textarea>
      </div>
      
      <div>
        <label class="block text-sm font-medium text-gray-700">Position</label>
        <input
          v-model="form.position"
          type="text"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
        />
      </div>
      
      <div>
        <label class="block text-sm font-medium text-gray-700">Photo</label>
        <input
          type="file"
          @change="handlePhotoUpload"
          class="mt-1 block w-full"
          accept="image/*"
        />
      </div>
      
      <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"
        :disabled="form.processing"
      >
        Save Changes
      </button>
    </form>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3'
  
  const props = defineProps({
    about: {
      type: Object,
      required: true
    }
  })
  
  const form = useForm({
    name: props.about.name,
    bio: props.about.bio,
    position: props.about.position,
    photo: null,
    social_links: props.about.social_links
  })
  
  const handlePhotoUpload = (e) => {
    form.photo = e.target.files[0]
  }
  
  const submit = () => {
    form.post(route('admin.about.update', props.about.id), {
      preserveScroll: true
    })
  }
  </script>