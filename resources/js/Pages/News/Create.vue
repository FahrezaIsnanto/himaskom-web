<template>
    <notifications position="top right" />
   <div>
     <Head title="Tambah Berita" />
     <h1 class="mb-8 text-3xl font-bold">
       <Link class="text-indigo-400 hover:text-indigo-600" href="/admin/news">Berita</Link>
       <span class="text-indigo-400 font-medium">/</span> Tambah
     </h1>
     <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
       <form @submit.prevent="store">
         <div class="flex flex-wrap -mb-8 -mr-6 p-8">
           <text-input v-model="form.title" :error="form.errors.title" class="pb-8 pr-6 w-full lg:w-1/2" label="Judul" />
           <text-input v-model="form.date" :error="form.errors.date" class="pb-8 pr-6 w-full lg:w-1/2" label="Tanggal" placeholder="d/m/y" />
           <text-input v-model="form.link" :error="form.errors.link" class="pb-8 pr-6 w-full lg:w-1/2" label="Link" />
           <file-input v-model="form.image" :error="form.errors.image" class="pb-8 pr-6 w-full lg:w-1/2" label="Gambar" />
         </div>
         <div class="flex px-10 py-4 bg-gray-100 border-t border-gray-100">
           <button :disabled="form.processing" class="px-6 py-3 text-white whitespace-nowrap text-sm font-bold leading-4 bg-amber-600 hover:bg-amber-700 focus:bg-amber-700 rounded ml-auto flex" type="submit"> 
                   <div v-if="form.processing" class="btn-spinner mr-2" />
               Simpan
           </button>
         </div>
       </form>
     </div>
   </div>
 </template>
 
 <script>
 import { Head, Link } from '@inertiajs/inertia-vue3'
 import Layout from '../../Shared/Layout'
 import TextInput from '../../Shared/TextInput'
 import FileInput from '../../Shared/FileInput'
 import LoadingButton from '../../Shared/LoadingButton'
 
 export default {
   components: {
     Head,
     Link,
     LoadingButton,
     TextInput,
     FileInput
   },
   layout: Layout,
   remember: 'form',
   data() {
     return {
       form: this.$inertia.form({
         title: null,
         date: null,
         link: null,
         image: null
       }),
     }
   },
   methods: {
   store() {
      this.form.post('/admin/news',{
       onError: (error)=>{
           const message = (error.msg)?error.msg:'';
            this.$notify({
             title: "Terjadi Kesalahan!",
             text: message,
             type: 'error'
           })
       },
       forceFormData: true
      })
    },
   },
 }
 </script>
 