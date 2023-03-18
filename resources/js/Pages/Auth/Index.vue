<template>
    <notifications position="top right" />
    <Head title="Login" />
    <div class="flex items-center justify-center p-6 min-h-screen bg-gray-100">
      <div class="w-full max-w-md">
        <img class="mx-auto w-[100px] md:w-[150px]" src="/images/logo.png"/>
        <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="store">
          <div class="px-10 py-12">
            <h1 class="text-center text-3xl font-bold">Selamat Datang!</h1>
            <div class="mt-6 mx-auto w-24 border-b-2" />
            <text-input v-model="form.username" :error="form.errors.username" class="mt-10" label="Username" type="text" autofocus autocapitalize="off" />
            <text-input v-model="form.password" :error="form.errors.password" class="mt-6" label="Password" type="password" />
          </div>
          <div class="flex px-10 py-4 bg-gray-100 border-t border-gray-100">
            <button :disabled="form.processing" class="px-6 py-3 text-white whitespace-nowrap text-sm font-bold leading-4 bg-amber-600 hover:bg-amber-700 focus:bg-amber-700 rounded ml-auto flex" type="submit"> 
                    <div v-if="form.processing" class="btn-spinner mr-2" />
                Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { Head } from '@inertiajs/inertia-vue3'
  import TextInput from '../../Shared/TextInput'
  import LoadingButton from '../../Shared/TextInput'
  
  export default {
    components: {
      Head,
      LoadingButton,
      TextInput,
    },
    data() {
      return {
        form: this.$inertia.form({
          username: '',
          password: '',
        }),
      }
    },
    methods: {
      store() {
        this.form.post('/auth',{
          onError: (error)=>{
              const message = (error.msg)?error.msg:'';
              this.$notify({
                title: "Terjadi Kesalahan!",
                text: message,
                type: 'error'
              });
          }
        });      
      },
    },
  }
  </script>