<template>
  <button
    id="color-btn"
    :style="{ backgroundColor: colorStore.btnColor }"
    @click="colorStore.changeShowModal()"
  ></button>

  <ModalColors v-if="colorStore.showModal" />
</template>

<script setup>
import { useColorStore } from "@/stores/colors"
import ModalColors from "../modal/ModalColors.vue"

const colorStore = useColorStore()
</script>

<style scoped>
/* =================================== BTN ====================================== */
#color-btn {
  width: 30px;
  height: 30px;
  border: none;
  opacity: 0.9;
  cursor: pointer;
  padding: 0 0px;
  margin-left: 20px;
  border-radius: 200px;
  transition: 0.3s;
}

#color-btn:hover {
  opacity: 1;
  transform: scale(1.1);
}
</style>
