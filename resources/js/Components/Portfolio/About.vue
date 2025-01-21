<template>
    <section class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8">
          <img
            :src="about.photo"
            alt="Profile Photo"
            class="h-48 w-48 rounded-full object-cover shadow-md"
          />
          <div>
            <h2 class="text-3xl font-bold">{{ about.name }}</h2>
            <p class="text-lg text-gray-600">{{ about.position }}</p>
            <p class="mt-4 text-gray-600">{{ about.bio }}</p>
            <div class="mt-4 flex space-x-4">
              <a
                v-for="(url, platform) in about.social_links"
                :key="platform"
                :href="url"
                target="_blank"
                rel="noopener noreferrer"
                class="text-blue-600 hover:underline"
              >
                {{ platform }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  defineProps({
    about: {
      type: Object,
      required: true,
    },
  });
  </script>
  