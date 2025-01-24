<script setup>
import { Head } from '@inertiajs/vue3'
import {ref} from 'vue'
import axios from 'axios'

defineProps({ user: String })
const url = ref('')
const urls = ref([])

async function handleSubmit () {
  const response = await axios.post('/urls', {
    url: url.value
  });

  urls.value.push(response.data)
}


</script>

<template>
  <Layout>
    <Head title="Welcome" />
    <h1>Welcome</h1>
    <p>Hello, {{ user }} welcome to your first Inertia app!</p>
    <form method="POST" @submit.prevent="handleSubmit">
      <input type="url" name="url" v-model="url">
      <button type="submit">Short it!</button>
    </form>
    <ul>
      <li v-for="url in urls">{{ url }}</li>
    </ul>
  </Layout>
</template>
