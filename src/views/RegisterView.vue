<template>
  <div class="container-register">
    <h1 :style="{ color: colorStore.color }">Cadastre-se</h1>
    <FormRegister />
  </div>
</template>

<script setup>
import FormRegister from "@/components/Register/FormRegister.vue"
import { useColorStore } from "@/stores/colors"

const colorStore = useColorStore()
</script>

<style scoped>
/* ========================== CONTAINER =============================== */
.container-register {
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

/* ========================== TEXT =============================== */
h1 {
  font-size: 26px;
  margin-bottom: 6px;
  transition: 0.3s;
}
</style>
