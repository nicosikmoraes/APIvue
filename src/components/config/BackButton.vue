<template>
  <button class="back_btn" @click="backPage()"><img src="/src/assets/images/undo.png" /></button>
</template>

<script setup>
import { useRouter } from "vue-router"

const router = useRouter()

function backPage() {
  router.go(-1)
}
</script>

<style scoped>
.back_btn {
  background-color: transparent;
  border: none;
  transition: 0.3s;
  cursor: pointer;
}

img {
  height: 32px;
}

img:hover {
  transform: scale(1.13);
}
</style>
