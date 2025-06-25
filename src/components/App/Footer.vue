<template>
  <div class="container-footer" :style="{ backgroundColor: colorStore.color }">
    <p>ApiVue - 2025 ©</p>
  </div>
</template>

<script setup>
import { useColorStore } from "../../stores/colors"

const colorStore = useColorStore()
</script>

<style scoped>
/* =================================== CONTAINER ====================================== */
.container-footer {
  width: 100vw;
  height: 70px;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: 0.3s;
}

/* =================================== TEXT ====================================== */
p {
  color: white;
}
</style>
