<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Side Navigation -->
    <div class="fixed w-64 h-full bg-white shadow-lg">
      <div class="p-4">
        <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>
      </div>
      <nav class="mt-4">
        <Link 
          v-for="link in navLinks" 
          :key="link.path"
          :href="link.path"
          class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
          :class="{ 'bg-gray-100': route().current(link.name) }"
        >
          {{ link.label }}
        </Link>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
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