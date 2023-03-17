<template>
    <notifications position="top right" />
     <div>
       <Head title="Admin" />
       <div class="flex mb-6">
         <Link class="btn-amber ml-auto font-poppins" href="/admin/admin/create">
           <span class="flex items-center"><icon name="plus" class="mr-2 fill-white"/> Tambah</span>
         </Link>
       </div>
       <div class="mb-6">
         <search-filter v-model="form.search" class="w-full" @reset="reset"></search-filter>
       </div>
       <div class="bg-white rounded-md shadow overflow-x-auto scrollbar-thin scrollbar-thumb-amber-600 scrollbar-track-amber-300">
         <table class="w-full whitespace-nowrap">
           <thead>
             <tr class="text-left font-bold bg-amber-100">
               <th class="py-2 px-3 text-center text-sm w-[10%]">Username</th>
               <th class="py-2 px-3 text-center text-sm w-[90%]">Nama Lengkap</th>
             </tr>
           </thead>
           <tbody>
             <tr v-for="admin in admin.data" :key="admin.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
               <td class="border-r border-t">
                 <Link class="flex items-center px-3 py-2 text-sm" :href="`/admin/admin/${admin.id}/edit`" tabindex="-1">
                   {{ admin.username }}
                 </Link>
               </td>
               <td class="border-r border-t">
                 <Link class="flex items-center px-3 py-2 text-sm" :href="`/admin/admin/${admin.id}/edit`" tabindex="-1">
                   {{ admin.fullname }}
                 </Link>
               </td>
             </tr>
             <tr v-if="admin.data.length === 0">
               <td class="px-3 py-2 border-r border-t" colspan="4">Belum terdapat data admin.</td>
             </tr>
             <tr>
               <td class="px-3 py-6 border-r border-t" colspan="4">
                   <pagination :links="admin" />
               </td>
             </tr>
           </tbody>
         </table>
       </div>
     </div>
   </template>
   
   <script>
   import { Head, Link } from '@inertiajs/inertia-vue3'
   import Icon from '../../Shared/Icon'
   import pickBy from 'lodash/pickBy'
   import Layout from '../../Shared/Layout'
   import throttle from 'lodash/throttle'
   import mapValues from 'lodash/mapValues'
   import Pagination from '../../Shared/Pagination'
   import SearchFilter from '../../Shared/SearchFilter'
   import Dropdown from '../../Shared/Dropdown'
   
   export default {
     components: {
       Head,
       Icon,
       Link,
       Pagination,
       SearchFilter,
       Dropdown,
   },
     layout: Layout,
     props: {
       admin: Object,
       filters: Object
     },
     data() {
       return {
         form: {
           search: this.filters.search,
           from: this.from
         },
       }
     },
     mounted(){
       if(this.$page.props.message){
         const message = this.$page.props.message;
              this.$notify({
               title: "Sukses",
               text: message,
               type: 'success'
         });
       }
     },
     watch: {
       form: {
         deep: true,
         handler: throttle(function () {
           this.$inertia.get('/admin/admin', pickBy(this.form), { preserveState: true })
         }, 150),
       },
     },
     methods: {
       reset() {
         this.form = mapValues(this.form, () => null)
       },
     },
   }
   </script>
   