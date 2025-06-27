<template>
  <div class="cards_container">
    <div
      v-for="itens in itensStore.itens"
      :key="itens.id"
      class="itens_container"
      @mouseover="itens.hover = true"
      @mouseleave="itens.hover = false"
      :style="{
        backgroundImage: `url('${itens.img}')`,
      }"
    >
      <HoverComponentVue v-show="itens.hover" :link="itens.link" :id="itens.id" />
      <p>{{ itens.titulo }}</p>
    </div>
  </div>
</template>

<script setup>
import { useUsersStore } from "@/stores/users"
import { onMounted, ref } from "vue"
import HoverComponentVue from "./HoverComponent.vue"
import { useItensStore } from "@/stores/itens"

// ============================== VARIABLES =================================================
const userStore = useUsersStore()
const itensStore = useItensStore()

// ============================== FUNCTIONS =================================================
onMounted(async () => {
  await itensStore.fetchItens()
})
</script>

<style scoped>
/* ============================== CONTAINER ================================================= */
.cards_container {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  gap: 25px;
  margin-top: 20px;
}

.itens_container {
  background-size: cover; /* cobre todo o elemento */
  background-position: center; /* centraliza a imagem */
  height: 200px; /* altura total da tela */
  width: 200px; /* largura total da tela */
  border-radius: 30px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  align-items: center;
  cursor: pointer;
  transition: 0.3s;
}

.itens_container:hover {
  opacity: 0.85;
  transform: scale(1.05);
}

/* ============================== TEXT ================================================= */
p {
  color: white;
  font-weight: bolder;
  text-shadow: 1.5px 1.5px black;
  margin-bottom: 5px;
}
</style>
