<template>
  <div v-show="status" id="alert-3" :class="status == 'success' ? cssclass.successClass : cssclass.failedClass"
    role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
      xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd"
        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
        clip-rule="evenodd"></path>
    </svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">{{ message }}</div>

  </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const message = computed(() => usePage().props.flash.message)
const status = computed(() => usePage().props.flash.status)


const cssclass = ref({
  successClass: "mx-12 flex p-4 mb-0 text-green-700 bg-green-100 rounded-lg",
  failedClass: "mx-12 flex p-4 mb-0 text-red-700 bg-red-100 rounded-lg",
});



</script>

<style></style>