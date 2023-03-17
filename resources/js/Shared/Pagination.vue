<template>
    <div v-if="links.links.length > 0">
      <div class="flex justify-start">
        <div class="font-semibold font-poppins text-xs flex items-center ">
            {{ links.from }} hingga {{ links.to }} dari {{links.total}} data
        </div>
        <div class="flex flex-wrap ml-5">
          <template v-for="(link, key) in links.links">
            <div v-if="link.url === null" :key="key" class="px-3 py-2 text-gray-600 text-sm leading-4 border rounded cursor-pointer" v-html="link.label" />
            <Link v-else :key="`link-${key}`" class="px-3 py-2 focus:text-gray-500 text-sm leading-4 hover:bg-white border focus:border-gray-500 rounded" :data="filters" :class="{ 'bg-amber-100': link.active }" :href="link.url" v-html="link.label" preserve-scroll/>
          </template>
      </div>
      </div>
    </div>
  </template>
  
  <script>
  import { Link } from '@inertiajs/inertia-vue3'
  
  export default {
    components: {
      Link,
    },
    props: {
      links: Object,
      filters: Object
    },
  }
  </script>
  