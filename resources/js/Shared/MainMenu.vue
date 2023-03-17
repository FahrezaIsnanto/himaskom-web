<template>
    <div>
      <div class="mb-4">
        <Link class="group flex items-center py-3" href="/admin/dashboard">
          <icon name="dashboard" class="mr-2 w-4 h-4" :class="isUrl('admin/dashboard') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('admin/dashboard') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
        </Link>
      </div>
      <div class="mb-4">
        <Link class="group flex items-center py-3" href="/admin/admin">
          <icon name="users" class="mr-2 w-4 h-4" :class="isUrl('admin/admin') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('admin/admin') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Admin</div>
        </Link>
      </div>
      <div class="mb-4">
        <Link class="group flex items-center py-3" href="/admin/news">
          <icon name="document" class="mr-2 w-4 h-4" :class="isUrl('admin/news') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('admin/news') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Berita Terbaru</div>
        </Link>
      </div>
      <div class="mb-4">
        <Link class="group flex items-center py-3" href="/admin/division">
          <icon name="cabinet" class="mr-2 w-4 h-4" :class="isUrl('admin/division') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('admin/division') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Bidang</div>
        </Link>
      </div>
    </div>
  </template>
  
  <script>
  import { Link } from '@inertiajs/inertia-vue3'
  import Icon from '../Shared/Icon'
  
  export default {
    components: {
      Icon,
      Link,
    },
    methods: {
      isUrl(...urls) {
        let currentUrl = this.$page.url.substr(1)
        if (urls[0] === '') {
          return currentUrl === ''
        }
        return urls.filter((url) => currentUrl.startsWith(url)).length
      },
    },
  }
  </script>