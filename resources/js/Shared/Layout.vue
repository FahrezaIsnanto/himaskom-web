<template>
    <div>
      <div id="dropdown" />
      <div class="md:flex md:flex-col">
        <div class="md:flex md:flex-col md:h-screen">
          <div class="md:flex md:flex-shrink-0">
            <div class="flex items-center justify-between px-6 py-4 bg-[#191e38] md:flex-shrink-0 md:justify-center md:w-56">
              <Link class="mt-1" href="/">
                <img class="mx-auto" src="/images/logo.png" width="50" />
              </Link>
              <dropdown class="md:hidden" placement="bottom-end">
                <template #default>
                  <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" /></svg>
                </template>
                <template #dropdown>
                  <div class="mt-2 px-8 py-4 bg-[#2f365f] rounded shadow-lg">
                    <main-menu />
                  </div>
                </template>
              </dropdown>
            </div>
            <div class="md:text-md flex items-center justify-between p-4 w-full text-sm bg-white border-b md:px-12 md:py-0">
              <div class="mr-4 mt-1">HIMASKOM 2023</div>
              <dropdown class="mt-1" placement="bottom-end">
                <template #default>
                  <div class="group flex items-center cursor-pointer select-none">
                    <div class="mr-1 text-gray-700 group-hover:text-[#5661b3] focus:text-[#5661b3] whitespace-nowrap">
                      <span class=" capitalize">{{ auth.admin.username }}</span>
                      <span class="hidden md:inline">&nbsp;{{auth.admin.username}}</span>
                    </div>
                    <icon class="w-5 h-5 fill-gray-700 group-hover:fill-[#5661b3] focus:fill-[#5661b3]" name="cheveron-down" />
                  </div>
                </template>
                <template #dropdown>
                  <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
                    <Link class="block px-6 py-2 hover:text-white hover:bg-[#6574cd]" :href="`/admin/admin/${auth.admin.id}/edit`">Profil Saya</Link>
                    <Link class="block px-6 py-2 hover:text-white hover:bg-[#6574cd]" href="/admin/admin">Kelola Admin</Link>
                    <Link class="block px-6 py-2 w-full text-left hover:text-white hover:bg-[#6574cd]" href="/auth" method="delete" as="button">Logout</Link>
                  </div>
                </template>
              </dropdown>
            </div>
          </div>
          <div class="md:flex md:flex-grow md:overflow-hidden">
            <main-menu class="hidden flex-shrink-0 p-12 w-56 bg-[#2f365f] overflow-y-auto md:block" />
            <div class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto bg-[#f1f5f9] h-screen" scroll-region>
              <flash-messages />
              <slot />
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { Link } from '@inertiajs/inertia-vue3'
  import Icon from '../Shared/Icon'
  import Dropdown from '../Shared/Dropdown'
  import MainMenu from '../Shared/MainMenu'
  import FlashMessages from '../Shared/FlashMessages'
  
  export default {
    components: {
      Dropdown,
      FlashMessages,
      Icon,
      Link,
      MainMenu,
    },
    props: {
      auth: Object,
    },
  }
  </script>