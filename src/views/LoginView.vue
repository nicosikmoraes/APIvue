<template>
  <div class="container-login">
    <h1 :style="{ color: colorStore.color }">Entre com seus dados</h1>
    <FormLogin />
  </div>
</template>

<script setup>
import { useColorStore } from "@/stores/colors"
import FormLogin from "@/components/Login/FormLogin.vue"

const colorStore = useColorStore()
</script>

<style scoped>
/* ========================== CONTAINER =============================== */
.container-login {
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

/* ========================== TEXT =============================== */
h1 {
  font-size: 30px;
  margin-bottom: 6px;
  transition: 0.3s;
}
</style>
