<template>
    <notifications position="top right" />
   <div>
     <Head title="Edit Admin" />
     <h1 class="mb-8 text-3xl font-bold">
       <Link class="text-indigo-400 hover:text-indigo-600" href="/admin/admin">Admin</Link>
       <span class="text-indigo-400 font-medium">/</span> Edit
     </h1>
     <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
       <form @submit.prevent="update">
         <div class="flex flex-wrap -mb-8 -mr-6 p-8">
           <text-input v-model="form.username" :error="form.errors.username" class="pb-8 pr-6 w-full lg:w-1/2" label="Username" />
           <text-input v-model="form.fullname" :error="form.errors.fullname" class="pb-8 pr-6 w-full lg:w-1/2" label="Nama Lengkap" />
           <text-input v-model="form.password" :error="form.errors.password" type="password" class="pb-8 pr-6 w-full lg:w-1/2" label="Password" />
         </div>
         <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
           <button @click.prevent="destroy" class="px-6 py-3 text-white whitespace-nowrap text-sm font-bold leading-4 bg-red-600 hover:bg-red-700 focus:bg-red-700 rounded ml-auto flex mr-2" type="submit"> 
               Hapus
           </button>
           <button :disabled="form.processing" class="px-6 py-3 text-white whitespace-nowrap text-sm font-bold leading-4 bg-amber-600 hover:bg-amber-700 focus:bg-amber-700 rounded flex" type="submit"> 
                   <div v-if="form.processing" class="btn-spinner" />
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
 import LoadingButton from '../../Shared/LoadingButton'
 
 export default {
   components: {
     Head,
     Link,
     LoadingButton,
     TextInput,
   },
   layout: Layout,
   remember: 'form',
   props: {
    admin: Object
   },
   data() {
     return {
       form: this.$inertia.form({
         username: this.admin.username,
         fullname: this.admin.fullname,
         password: ''
       }),
     }
   },
   methods: {
    update() {
       this.form.put(`/admin/admin/${this.admin.id}`,{
        onError: (error)=>{
            const message = (error.msg)?error.msg:'';
             this.$notify({
              title: "Terjadi Kesalahan!",
              text: message,
              type: 'error'
            });
        }
       })
     },
     destroy(){
        if (confirm('Apakah anda yakin akan menghapus?')) {
            this.$inertia.delete(`/admin/admin/${this.admin.id}`,{
                onError: (error)=>{
                    const message = (error.msg)?error.msg:'';
                    this.$notify({
                    title: "Terjadi Kesalahan!",
                    text: message,
                    type: 'error'
                    });
                }
            })
        }
     }
   },
 }
 </script>
 