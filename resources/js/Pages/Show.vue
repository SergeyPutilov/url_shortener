<script setup>
import { Head } from '@inertiajs/vue3'

defineProps({ user: String })
</script>

<template>
  <Layout>
    <Head title="Welcome" />
    <h1>Welcome</h1>
    <p>Hello, {{ user }} welcome to your first Inertia app!</p>
  </Layout>
</template>
