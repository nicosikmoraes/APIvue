<template>
  <div class="container-main">
    <h1>Bem Vindo {{ userStore.name }}</h1>
  </div>
</template>

<script setup>
import { useUsersStore } from "@/stores/users"

const userStore = useUsersStore()
</script>

<style scoped></style>
