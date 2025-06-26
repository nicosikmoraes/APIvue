<template>
  <!-- ================================= MODAL ====================================== -->
  <div class="modal-content" :style="{ backgroundColor: colorStore.color }">
    <header>
      <button id="close-btn" @click="close">X</button>
      <h1>Selecione o Tema:</h1>
    </header>

    <main class="modal-body">
      <button
        class="btn"
        :style="{ backgroundColor: '#303f7e' }"
        @click="colorStore.changeMainColor('#171f40', '#303f7e')"
      ></button>

      <button
        class="btn"
        :style="{ backgroundColor: '#612588' }"
        @click="colorStore.changeMainColor('#3d115a', '#612588')"
      ></button>

      <button
        class="btn"
        :style="{ backgroundColor: '#a6262c' }"
        @click="colorStore.changeMainColor('#86181d', '#a6262c')"
      ></button>

      <button
        class="btn"
        :style="{ backgroundColor: '#c63d24' }"
        @click="colorStore.changeMainColor('#a12c17', '#c63d24')"
      ></button>

      <button
        class="btn"
        :style="{ backgroundColor: '#e9ce20' }"
        @click="colorStore.changeMainColor('#867818', '#e9ce20')"
      ></button>
    </main>
  </div>
  <!-- ================================= FIM MODAL ====================================== -->
</template>

<script setup>
import { useColorStore } from "../../../stores/colors"

// Importa o store de cores
const colorStore = useColorStore()

// Função para fechar o modal
function close() {
  colorStore.changeShowModal()
}
</script>

<style scoped>
/* =================================== CONTAINER ====================================== */
.modal-content {
  position: absolute;
  right: 20px;
  top: 50px;
  padding: 12px 20px;
  border-radius: 8px;
  min-width: 250px;
  max-width: 500px;
  animation: fadeIn 0.3s ease;
  box-shadow: 10px 0 25px rgba(0, 0, 0, 0.2);
  transition: 0.3s;
}

header {
  display: flex;
  flex-direction: row-reverse;
  align-items: center;
  justify-content: space-between;
}

.modal-body {
  padding: 10px 0px;
  display: flex;
  gap: 15px;
}

/* =================================== ANIMATION ====================================== */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* =================================== TEXT ====================================== */
h1 {
  font-size: 18px;
  color: white;
}

/* =================================== BTN ====================================== */
.btn {
  width: 30px;
  height: 30px;
  border: none;
  opacity: 0.9;
  cursor: pointer;
  padding: 0 0px;
  border-radius: 200px;
  box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
  transition: 0.3s;
}

.btn:hover {
  opacity: 1;
  transform: scale(1.1);
}

#close-btn {
  background-color: transparent;
  border: none;
  color: white;
  cursor: pointer;
  font-size: 20px;
}
</style>
