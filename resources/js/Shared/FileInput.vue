<template>
    <div>
      <label v-if="label" class="mb-2 block text-gray-700 select-none">{{ label }}:</label>
      <div class="leading-normal block w-full border text-gray-700 bg-white font-sans rounded text-left appearance-none relative focus:border-indigo-400 focus:ring p-0" :class="{ error: errors.length }">
        <input ref="file" type="file" :accept="accept" class="hidden" @change="change" />
        <div v-if="!modelValue" class="p-2">
          <button type="button" class="px-4 py-1 text-white text-xs font-medium bg-gray-500 hover:bg-gray-700 rounded-sm" @click="browse">Pilih</button>
        </div>
        <div v-else class="flex items-center justify-between p-2">
          <div class="flex-1 pr-1 overflow-hidden">
            {{ modelValue.name.substring(0,10) }} <span class="text-gray-500 text-xs">({{ filesize(modelValue.size) }})</span>
          </div>
          <button type="button" class="px-4 py-1 text-white text-xs font-medium bg-gray-500 hover:bg-gray-700 rounded-sm" @click="remove">Hapus</button>
        </div>
      </div>
      <div v-if="errors.length" class="text-red-700 mt-2 text-sm">{{ errors[0] }}</div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      modelValue: File,
      label: String,
      accept: String,
      errors: {
        type: Array,
        default: () => [],
      },
    },
    emits: ['update:modelValue'],
    watch: {
      modelValue(value) {
        if (!value) {
          this.$refs.file.value = ''
        }
      },
    },
    methods: {
      filesize(size) {
        var i = Math.floor(Math.log(size) / Math.log(1024))
        return (size / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i]
      },
      browse() {
        this.$refs.file.click()
      },
      change(e) {
        this.$emit('update:modelValue', e.target.files[0])
      },
      remove() {
        this.$emit('update:modelValue', null)
      },
    },
  }
  </script>
  