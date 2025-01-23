<template>
    <Layout>
      <div class="max-w-2xl mx-auto p-8 bg-white rounded-2xl shadow-lg border border-gray-100">
        <h1 class="text-3xl font-extrabold mb-8 text-gray-800 border-b pb-4">Edit Tech Stack</h1>
        
        <form @submit.prevent="submit" class="space-y-8">
          <div>
            <label class="block text-md font-semibold text-gray-700 mb-2">Name</label>
            <input 
              v-model="form.name" 
              type="text" 
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
            >
            <p v-if="form.errors.name" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.name }}</p>
          </div>
  
          <div>
            <label class="block text-md font-semibold text-gray-700 mb-2">Icon</label>
            <div class="flex items-center space-x-4">
              <img v-if="form.icon" :src="form.icon" 
                   class="h-12 w-12 object-contain border rounded p-1">
              <input 
                type="file" 
                @input="form.icon = $event.target.files[0]"
                class="border p-2 rounded-md file:mr-4 file:rounded-md file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-blue-700 hover:file:bg-blue-100"
                accept="image/png, image/jpeg, image/svg+xml"
              >
            </div>
            <p v-if="form.errors.icon" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.icon }}</p>
          </div>
  
          <div>
            <label class="block text-md font-semibold text-gray-700 mb-2">Category</label>
            <select 
              v-model="form.category" 
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
            >
              <option value="">Select Category</option>
              <option value="frontend">Frontend</option>
              <option value="backend">Backend</option>
              <option value="mobile">Mobile</option>
              <option value="database">Database</option>
              <option value="devops">DevOps</option>
              <option value="other">Other</option>
            </select>
            <p v-if="form.errors.category" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.category }}</p>
          </div>
  
          <div>
            <label class="block text-md font-semibold text-gray-700 mb-2">Proficiency</label>
            <div class="flex items-center space-x-4">
              <div class="flex-grow relative">
                <input 
                  v-model.number="form.proficiency" 
                  type="range" 
                  min="1" 
                  max="100"
                  class="w-full h-2 bg-gray-200 rounded-full appearance-none cursor-pointer 
                         [&::-webkit-slider-thumb]:appearance-none 
                         [&::-webkit-slider-thumb]:w-6 
                         [&::-webkit-slider-thumb]:h-6 
                         [&::-webkit-slider-thumb]:bg-blue-600 
                         [&::-webkit-slider-thumb]:rounded-full 
                         [&::-webkit-slider-thumb]:shadow-lg
                         [&::-moz-range-thumb]:appearance-none 
                         [&::-moz-range-thumb]:w-6 
                         [&::-moz-range-thumb]:h-6 
                         [&::-moz-range-thumb]:bg-blue-600 
                         [&::-moz-range-thumb]:rounded-full 
                         [&::-moz-range-thumb]:shadow-lg"
                />
              </div>
              <input 
                v-model.number="form.proficiency"
                type="number"
                min="1"
                max="100"
                class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-center focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
              />
            </div>
            <p v-if="form.errors.proficiency" class="text-red-500 text-sm mt-2 pl-1">{{ form.errors.proficiency }}</p>
          </div>
  
          <div class="flex justify-end space-x-4">
            <Link 
              :href="route('admin.tech-stacks.index')" 
              class="px-6 py-3 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-300"
            >
              Cancel
            </Link>
            <button 
              type="submit" 
              class="px-6 py-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300"
              :disabled="form.processing"
            >
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
    techStack: Object
});
  
const form = useForm({
    name: props.techStack.name,
    icon: null,
    proficiency: props.techStack.proficiency,
    category: props.techStack.category
});
  
const submit = () => {
    form.transform((data) => ({
        ...data,
        _method: 'PUT'
    })).post(route('admin.tech-stacks.update', props.techStack.id), {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => router.visit(route('admin.tech-stacks.index')),
        onError: (errors) => console.error('Update failed:', errors)
    })
}
</script>