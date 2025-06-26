<template>
  <button class="btn_icon" @click="navbarStore.changeShowModal()">
    <img class="btn_icon" src="/src/assets/images/user.png" />
  </button>

  <ModalUser v-if="navbarStore.showModal" />
</template>

<script setup>
import ModalUser from "../modal/ModalUser.vue"
import { useNavbarStore } from "@/stores/navbar"

const navbarStore = useNavbarStore()
</script>

<style scoped>
/* =================================== ICON ====================================== */
.btn_icon {
  background-color: transparent;
  height: 37px;
  border: none;
  padding: 0px 0px;
  cursor: pointer;
  transition: 0.3s;
  opacity: 0.9;
}

.btn_icon:hover {
  transform: scale(1.05);
  opacity: 1;
}
</style>
