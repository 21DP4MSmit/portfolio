<template>
  <div class="min-h-screen bg-[#121212]">
    <!-- Centered Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 flex justify-center py-4">
      <div class="bg-zinc-800/70 backdrop-blur-sm px-6 py-2 rounded-full">
        <ul class="flex space-x-6">
          <li>
            <a href="/" class="text-gray-300 hover:text-white transition-colors">
              Home
            </a>
          </li>
          <li>
            <a href="/projects" class="text-gray-300 hover:text-white transition-colors">
              Projects
            </a>
          </li>
          <li>
            <a href="/contact" class="text-gray-300 hover:text-white transition-colors">
              Contact
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20 pb-10">
      <div class="mx-auto max-w-screen-lg">
        <slot />
      </div>
    </main>
  </div>
</template>

<script setup>
</script>

<style>
/* Add these styles to your global CSS or keep them here */
body {
  background-color: #121212;
  color: white;
}

</style>