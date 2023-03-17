<template>
    <button :disabled="loading" class="flex items-center bg-none outline-none">
      <div v-if="loading" class="btn-spinner mr-2" />
      <slot />
    </button>
  </template>
  
  <script>
  export default {
    props: {
      loading: Boolean,
    },
  }
  </script>