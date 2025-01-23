<template>
    <Layout>
        <div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-100">
        <h1 class="text-3xl font-extrabold mb-8 text-gray-800 border-b pb-4">Edit Education</h1>
        
        <form @submit.prevent="submit" class="space-y-8">
          <div>
            <label class="block text-md font-semibold text-gray-700 mb-2">Institution</label>
            <input 
              v-model="form.institution" 
              type="text" 
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
            >
            <p v-if="form.errors.institution" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.institution }}</p>
          </div>
  
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <label class="block text-md font-semibold text-gray-700 mb-2">Degree</label>
              <input 
                v-model="form.degree" 
                type="text" 
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
              >
              <p v-if="form.errors.degree" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.degree }}</p>
            </div>
  
            <div>
              <label class="block text-md font-semibold text-gray-700 mb-2">Field of Study</label>
              <input 
                v-model="form.field_of_study" 
                type="text" 
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
              >
              <p v-if="form.errors.field_of_study" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.field_of_study }}</p>
            </div>
          </div>
  
          <div class="grid grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700">Start Date</label>
              <VueDatePicker v-model="form.start_date" :enable-time-picker="false" auto-apply />
              <p v-if="form.errors.start_date" class="text-red-500 text-sm mt-1">{{ form.errors.start_date }}</p>
            </div>
  
            <div>
              <label class="block text-sm font-medium text-gray-700">End Date</label>
              <VueDatePicker v-model="form.end_date" :enable-time-picker="false" auto-apply />
              <p v-if="form.errors.end_date" class="text-red-500 text-sm mt-1">{{ form.errors.end_date }}</p>
            </div>
          </div>
  
          <div>
            <label class="block text-sm font-medium text-gray-700">Location</label>
            <input v-model="form.location" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <p v-if="form.errors.location" class="text-red-500 text-sm mt-1">{{ form.errors.location }}</p>
          </div>
  
          <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea v-model="form.description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
            <p v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</p>
          </div>
  
          <div class="flex justify-end space-x-4">
            <Link :href="route('admin.education.index')" class="btn-secondary">
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
    education: Object
})
  
const form = useForm({
    institution: props.education.institution,
    degree: props.education.degree,
    field_of_study: props.education.field_of_study,
    start_date: props.education.start_date,
    end_date: props.education.end_date,
    description: props.education.description,
    location: props.education.location
})
  
const submit = () => {
    form.put(route('admin.education.update', props.education.id), {
        preserveScroll: true,
  })
}
</script>