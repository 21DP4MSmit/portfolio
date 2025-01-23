<template>
    <Layout>
      <div class="p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6">Add Education</h1>
        
        <form @submit.prevent="submit" class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-gray-700">Institution</label>
            <input v-model="form.institution" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <p v-if="form.errors.institution" class="text-red-500 text-sm mt-1">{{ form.errors.institution }}</p>
          </div>
  
          <div class="grid grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700">Degree</label>
              <input v-model="form.degree" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
              <p v-if="form.errors.degree" class="text-red-500 text-sm mt-1">{{ form.errors.degree }}</p>
            </div>
  
            <div>
              <label class="block text-sm font-medium text-gray-700">Field of Study</label>
              <input v-model="form.field_of_study" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
              <p v-if="form.errors.field_of_study" class="text-red-500 text-sm mt-1">{{ form.errors.field_of_study }}</p>
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
              Create
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
  
const form = useForm({
    institution: '',
    degree: '',
    field_of_study: '',
    start_date: null,
    end_date: null,
    description: '',
    location: ''
})
  
const submit = () => {
    form.post(route('admin.education.store'))
  }
</script>