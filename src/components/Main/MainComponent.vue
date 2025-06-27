<template>
  <div class="container-main">
    <h1 :style="{ color: colorStore.color }">Olá {{ userStore.name }}</h1>

    <ItensComponentVue />
  </div>
</template>

<script setup>
import { useUsersStore } from "@/stores/users"
import HoverComponentVue from "./HoverComponent.vue"
import { useItensStore } from "@/stores/itens"
import ItensComponentVue from "./ItensComponent.vue"
import { useColorStore } from "@/stores/colors"

// ============================== VARIABLES =================================================
const userStore = useUsersStore()
const itensStore = useItensStore()
const colorStore = useColorStore()
</script>

<style scoped>
/* ============================== CONTAINER ================================================= */
.container-main {
  display: flex;
  flex-direction: column;
  border: 1px solid black;
  width: 100%;
  min-height: 100vh;
  justify-content: flex-start;
  align-items: center;
}

/* ============================== TEXT ================================================= */
h1 {
  margin-top: 200px;
  font-size: 26px;
  font-weight: bolder;
}
</style>
