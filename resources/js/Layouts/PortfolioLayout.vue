<template>
    <div class="min-h-screen flex flex-col">
      <!-- Header -->
      <header class="bg-gray-900 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6">
          <h1 class="text-2xl font-bold">My Portfolio</h1>
          <nav>
            <ul class="flex space-x-4">
              <li><a href="/" class="hover:underline">Home</a></li>
              <li><a href="/projects" class="hover:underline">Projects</a></li>
              <li><a href="/contact" class="hover:underline">Contact</a></li>
            </ul>
          </nav>
        </div>
      </header>
  
      <!-- Main Content -->
      <main class="flex-grow bg-gray-100 py-10">
        <div class="container mx-auto px-6">
          <slot />
        </div>
      </main>
  
      <!-- Footer -->
      <footer class="bg-gray-900 text-white py-4">
        <div class="container mx-auto text-center text-sm">
          &copy; {{ new Date().getFullYear() }} My Portfolio. All rights reserved.
        </div>
      </footer>
    </div>
  </template>
  
  <script setup>

  </script>
  
  <style>
  /* Add any additional global styles here */
  </style>
  