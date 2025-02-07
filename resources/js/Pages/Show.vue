<script setup>
import {Head} from '@inertiajs/vue3'
import {ref} from 'vue'
import axios from 'axios'

defineProps({user: String})
const url = ref('')
const urls = ref([])

async function handleSubmit() {
  const response = await axios.post('/urls', {
    url: url.value
  })

  urls.value.push(response.data)
}

function copyUrl(url) {
  navigator.clipboard.writeText(url);
}


</script>

<template>
  <div class=" h-screen flex flex-col">
    <h1>URL Shortener</h1>
    <div class=" flex justify-center items-center flex-grow">
      <div class="">
        <Head title="Welcome"/>

        <p>Hello, {{ user }} welcome to your first Inertia app!</p>
        <form method="POST" @submit.prevent="handleSubmit" class="flex gap-2">
          <input type="url" name="url" v-model="url" class="px-2 py-2 border border-gray-600 rounded">
          <button type="submit" class="bg-green-800 text-white px-6 py-2 rounded">Short it!</button>
        </form>
        <ul class="mt-6">
          <li v-for="url in urls"
              class="bg-gray-200 p-2 flex items-center justify-between gap-2">
            {{ url }}

            <button title="Copy" @click="copyUrl(url)">
              <svg clip-rule="evenodd" class="h-5" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"
                   viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m6 19v2c0 .621.52 1 1 1h2v-1.5h-1.5v-1.5zm7.5 3h-3.5v-1.5h3.5zm4.5 0h-3.5v-1.5h3.5zm4-3h-1.5v1.5h-1.5v1.5h2c.478 0 1-.379 1-1zm-1.5-1v-3.363h1.5v3.363zm0-4.363v-3.637h1.5v3.637zm-13-3.637v3.637h-1.5v-3.637zm11.5-4v1.5h1.5v1.5h1.5v-2c0-.478-.379-1-1-1zm-10 0h-2c-.62 0-1 .519-1 1v2h1.5v-1.5h1.5zm4.5 1.5h-3.5v-1.5h3.5zm3-1.5v-2.5h-13v13h2.5v-1.863h1.5v3.363h-4.5c-.48 0-1-.379-1-1v-14c0-.481.38-1 1-1h14c.621 0 1 .522 1 1v4.5h-3.5v-1.5z"
                    fill-rule="nonzero"/>
              </svg>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
