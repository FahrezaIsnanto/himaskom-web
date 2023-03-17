<template>
    <div>
      <Head title="Dashboard" />
      <div class="relative flex flex-col break-words bg-white bg-clip-border rounded-lg shadow-sm p-5">   
        <h1 class="mb-8 text-3xl font-bold font-poppins">Dashboard</h1>
        <p class="mb-2 leading-normal font-poppins">Halo Semua! Selamat Datang pada Sistem Manajemen Website <a class="text-amber-500 hover:text-orange-600 underline" href="/">HIMASKOM</a></p>
        <p class="mb-8 leading-normal font-poppins">Silahkan memilih menu disamping kiri, untuk melakukan manajemen</p>
      </div>
    </div>
  </template>
  
  <script>
  import { Head } from '@inertiajs/inertia-vue3'
  import Layout from '../../Shared/Layout.vue'
  
  export default {
    components: {
      Head,
    },
    layout: Layout,
  }
  </script>