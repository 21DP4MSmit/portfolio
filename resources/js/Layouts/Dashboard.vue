<template>
  <div class="min-h-screen bg-zinc-900">
    <!-- Side Navigation -->
    <div class="fixed w-64 h-full bg-zinc-800 shadow-lg flex flex-col">
      <div class="p-4">
        <h1 class="text-2xl font-bold text-white">Admin Panel</h1>
      </div>
      <nav class="mt-4 flex-1">
        <Link 
          v-for="link in navLinks" 
          :key="link.path"
          :href="link.path"
          class="block px-6 py-2 font-bold text-gray-400 hover:bg-zinc-700"
          :class="{ 'bg-zinc-700': route().current(link.name) }"
        >
          {{ link.label }}
        </Link>
      </nav>
      
      <!-- Add this button at the bottom -->
      <div class="p-4 border-t border-zinc-700">
        <Link 
          :href="route('home')" 
          class="w-full flex items-center px-4 py-2 text-sm font-medium text-gray-400 hover:bg-zinc-700 rounded-md transition-colors"
        >
          <span class="ml-2">Back to Home</span>
        </Link>
      </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8 text-gray-400">
      <slot />
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const navLinks = [
    { label: 'About', path: route('admin.about.edit'), name: 'admin.about.edit' },
    { label: 'Tech Stacks', path: route('admin.tech-stacks.index'), name: 'admin.tech-stacks.index' },
    { label: 'Education', path: route('admin.education.index'), name: 'admin.education.index' },
    { label: 'Work Experience', path: route('admin.experience.index'), name: 'admin.experience.index' },
    { label: 'Projects', path: route('admin.projects.index'), name: 'admin.projects.index' }
];
</script>