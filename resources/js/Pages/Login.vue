<template>
    <div class="min-h-screen flex items-center justify-center bg-[#121212]">
      <div class="bg-zinc-800 p-8 rounded-lg w-96">
        <h1 class="text-2xl font-bold text-white mb-6">Admin Login</h1>
        
        <form @submit.prevent="submit">
          <div class="space-y-4">
            <div>
              <label class="text-gray-300">Email</label>
              <input 
                v-model="form.email" 
                type="email"
                class="w-full p-2 rounded bg-zinc-700 text-white"
              />
            </div>
            
            <div>
              <label class="text-gray-300">Password</label>
              <input 
                v-model="form.password" 
                type="password"
                class="w-full p-2 rounded bg-zinc-700 text-white"
              />
            </div>
  
            <button 
              type="submit"
              class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600"
            >
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3'
  
  const form = useForm({
    email: '',
    password: ''
  })
  
  const submit = () => {
    form.post(route('login'))
  }
  </script>