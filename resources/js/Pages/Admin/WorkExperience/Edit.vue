<template>
    <Layout>
      <div class="max-w-4xl mx-auto p-8 bg-[#121212] rounded-2xl shadow-lg border border-gray-100">
        <h1 class="text-3xl font-extrabold mb-8 text-gray-400 border-b pb-4">Edit Work Experience</h1>
        
        <form @submit.prevent="submit" class="space-y-8">
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <label class="block text-md font-semibold text-gray-400 mb-2">Company</label>
              <input v-model="form.company" type="text" class="w-full px-4 py-3 bg-zinc-900 text-gray-200 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
              <p v-if="form.errors.company" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.company }}</p>
            </div>
  
            <div>
              <label class="block text-md font-semibold text-gray-400 mb-2">Position</label>
              <input v-model="form.position" type="text" class="w-full px-4 py-3 bg-zinc-900 text-gray-200 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
              <p v-if="form.errors.position" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.position }}</p>
            </div>
          </div>
  
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <label class="block text-md font-semibold text-gray-400 mb-2">Start Date</label>
              <VueDatePicker v-model="form.start_date" :enable-time-picker="false" auto-apply />
              <p v-if="form.errors.start_date" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.start_date }}</p>
            </div>
  
            <div>
              <label class="block text-md font-semibold text-gray-400 mb-2">End Date</label>
              <VueDatePicker 
                v-model="form.end_date" 
                :enable-time-picker="false" 
                auto-apply
                :disabled="form.is_current"
              />
              <div class="mt-2 flex items-center">
                <input v-model="form.is_current" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <label class="ml-2 text-sm text-gray-400">Currently working here</label>
              </div>
              <p v-if="form.errors.end_date" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.end_date }}</p>
            </div>
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
            <label class="block text-md font-semibold text-gray-400 mb-2">Location</label>
            <input v-model="form.location" type="text" class="w-full px-4 py-3 bg-zinc-900 text-gray-200 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
            <p v-if="form.errors.location" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.location }}</p>
          </div>
  
          <div class="flex justify-end space-x-4">
            <Link :href="route('admin.experience.index')" class="btn-secondary">
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
import { useForm, Link } from '@inertiajs/vue3'
import VueDatePicker from '@vuepic/vue-datepicker'
import Layout from '@/Layouts/Dashboard.vue'
  
const props = defineProps({
    experience: Object
})
  
const form = useForm({
    company: props.experience.company,
    position: props.experience.position,
    start_date: props.experience.start_date,
    end_date: props.experience.end_date,
    description: props.experience.description,
    location: props.experience.location,
    is_current: props.experience.is_current
})
  
const submit = () => {
    form.put(route('admin.experience.update', props.experience.id), {
        preserveScroll: true,
  })
}
</script>