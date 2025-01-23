<template>
  <div class="min-h-screen bg-zinc-900">
    <!-- Side Navigation -->
    <div class="fixed w-64 h-full bg-zinc-800 shadow-lg">
      <div class="p-4">
        <h1 class="text-2xl font-bold text-white">Admin Panel</h1>
      </div>
      <nav class="mt-4">
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
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8 text-gray-400">
      <slot /> <!-- This renders the child component (e.g., Education/Index.vue) -->
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