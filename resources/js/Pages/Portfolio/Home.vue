<template>
    <layout>
      <div class="space-y-20">
        <about-section :about="about" />
        <tech-stack-section :techStacks="techStacks" />
        <education-section :education="education" />
        <experience-section :experience="experience" />
      </div>
    </layout>
  </template>
  
  <script setup>
  import { Head } from '@inertiajs/vue3'
  import Layout from '@/Layouts/PortfolioLayout.vue'
  import AboutSection from '@/Components/Portfolio/About.vue'
  import TechStackSection from '@/Components/Portfolio/TechStack.vue'
  import EducationSection from '@/Components/Portfolio/Education.vue'
  import ExperienceSection from '@/Components/Portfolio/Experience.vue'
  
  defineProps({
    about: Object,
    techStacks: Array,
    education: Array,
    experience: Array
  })
  </script>