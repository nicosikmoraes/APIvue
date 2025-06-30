<template>
  <div class="container_config">
    <ConfigComponent />
  </div>
</template>

<script setup>
import ConfigComponent from "@/components/config/ConfigComponent.vue"
</script>

<style scoped>
.container_config {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  min-height: 100vh;
  width: 100%;
}
</style>
