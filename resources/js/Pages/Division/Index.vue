<template>
    <notifications position="top right" />
     <div>
       <Head title="Bidang" />
       <div class="flex mb-6">
         <Link class="btn-amber ml-auto font-poppins" href="/admin/division/create">
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
               <th class="py-2 px-3 text-center text-sm w-[70%]">Bidang</th>
               <th class="py-2 px-3 text-center text-sm w-[30%]">Gambar</th>
             </tr>
           </thead>
           <tbody>
             <tr v-for="division in division.data" :key="division.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
               <td class="border-r border-t">
                 <Link class="flex items-center px-3 py-2 text-sm" :href="`/admin/division/${division.id}/edit`" tabindex="-1">
                   {{ division.title }}
                 </Link>
               </td>
               <td class="border-r border-t">
                 <Link class="flex items-center px-3 py-2 text-sm" :href="`/admin/division/${division.id}/edit`" tabindex="-1">
                   <img :src="`/storage/${division.image}`" class="mx-auto" width="90"/>
                 </Link>
               </td>
             </tr>
             <tr v-if="division.data.length === 0">
               <td class="px-3 py-2 border-r border-t" colspan="4">Belum terdapat data berita.</td>
             </tr>
             <tr>
               <td class="px-3 py-6 border-r border-t" colspan="4">
                   <pagination :links="division" />
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
       division: Object,
       filters: Object
     },
     data() {
       return {
         form: {
           search: this.filters.search
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
           this.$inertia.get('/admin/division', pickBy(this.form), { preserveState: true })
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
   