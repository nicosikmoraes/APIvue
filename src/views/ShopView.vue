<template>
  <div class="container_config">
    <ShopComponent />
  </div>
</template>

<script setup>
import ShopComponent from "@/components/Shop/ShopComponent.vue"
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
