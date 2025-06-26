<template>
  <div class="container-home">
    <!-- Title -->
    <h1 :style="{ color: colorStore.color }">APIvue</h1>

    <!-- Table -->
    <TableHome />
  </div>
</template>

<script setup>
import { useColorStore } from "@/stores/colors"
import TableHome from "./TableHome.vue"
import { useNavbarStore } from "@/stores/navbar"
import { onMounted } from "vue"

const colorStore = useColorStore()
const navbarStore = useNavbarStore()

onMounted(() => {
  navbarStore.loggedOut()
})
</script>

<style scoped>
/* ========================== CONTAINER ================================= */
.container-home {
  position: absolute;
  top: 180px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

/* ========================== TEXT ================================= */
h1 {
  font-size: 36px;
  font-style: italic;
  font-weight: 370;
  transition: 0.3s;
}
</style>
