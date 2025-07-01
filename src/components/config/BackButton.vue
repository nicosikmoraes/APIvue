<template>
  <div class="btn_container">
    <button class="back_btn" @click="backPage()"><img src="/src/assets/images/undo.png" /></button>
  </div>
</template>

<script setup>
import { useRouter } from "vue-router"

const router = useRouter()

function backPage() {
  router.go(-1)
}
</script>

<style scoped>
.btn_container {
  width: 10%;
}

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
