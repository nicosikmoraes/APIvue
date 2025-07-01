<template>
  <!-- ================================= MODAL ====================================== -->
  <div class="modal-content" :style="{ backgroundColor: colorStore.color }">
    <header>
      <button id="close-btn" @click="close">X</button>
      <h1>Opções:</h1>
    </header>

    <main class="modal-body">
      <button class="btn_modal" :style="{ color: colorStore.color }" @click="goToConfig()">Conta</button>
      <button class="btn_modal" :style="{ color: colorStore.color }" @click="goToShop()">
        Carrinho ({{ userStore.cart_itens }})
      </button>
    </main>
  </div>
  <!-- ================================= FIM MODAL ====================================== -->
</template>

<script setup>
import { useColorStore } from "@/stores/colors"
import { useNavbarStore } from "@/stores/navbar"
import { useUsersStore } from "@/stores/users"
import { useRouter } from "vue-router"

// Importa o store de cores
const colorStore = useColorStore()
const navbarStore = useNavbarStore()
const userStore = useUsersStore()
const router = useRouter()

// Função para fechar o modal
function close() {
  navbarStore.changeShowModal()
}

function goToConfig() {
  router.push("/config")
  close()
}

function goToShop() {
  router.push("/shop")
  close()
}
</script>

<style scoped>
/* =================================== CONTAINER ====================================== */
.modal-content {
  position: absolute;
  right: 57px;
  top: 50px;
  padding: 12px 20px;
  border-radius: 8px;
  min-width: 180px;
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
  flex-direction: column;
  gap: 12px;
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
  font-size: 17px;
  font-weight: 600;
  color: white;
}

/* =================================== BTN ====================================== */
#close-btn {
  background-color: transparent;
  border: none;
  color: white;
  cursor: pointer;
  font-size: 20px;
}

.btn_modal {
  cursor: pointer;
  border: none;
  height: 30px;
  font-size: 15px;
  font-weight: bold;
  padding: 0 0px;
  border-radius: 10px;
  transition: 0.3s;
}

.btn_modal:hover {
  transform: scale(1.05);
  box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
}
</style>
