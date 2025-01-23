<template>
  <div class="min-h-screen bg-[#121212]">
    <nav class="fixed top-0 left-0 right-0 z-50 flex justify-center py-4">
      <div class="bg-zinc-800/70 backdrop-blur-sm px-6 py-2 rounded-full">
        <ul class="flex space-x-6">
          <li>
            <a href="/" class="text-gray-300 hover:text-white transition-colors">Home</a>
          </li>
          <li>
            <a href="/projects" class="text-gray-300 hover:text-white transition-colors">Projects</a>
          </li>
          <li>
            <a href="/contact" class="text-gray-300 hover:text-white transition-colors">Contact</a>
          </li>
        </ul>
      </div>
      
      <!-- Admin Button -->
      <Link 
        href="/admin"
        class="fixed top-4 right-4 text-sm text-gray-500 hover:text-gray-300"
      >
        Admin
      </Link>
    </nav>

    <main class="pt-20 pb-10">
      <div class="mx-auto max-w-screen-lg">
        <slot />
      </div>
    </main>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<style>
body {
  background-color: #121212;
  color: white;
}
</style>