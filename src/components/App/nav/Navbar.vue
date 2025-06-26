<template>
  <div class="navbar" :style="{ backgroundColor: colorStore.color }">
    <!-- Navega para Home -->
    <router-link to="/" id="logo">
      <h1>APIvue</h1>
    </router-link>

    <div class="btns">
      <button id="login-btn" class="btn" @click="goToLogin()">Login</button>
      <button id="register-btn" class="btn" @click="goToRegister()">Cadastro</button>

      <ColorComponent />
    </div>
  </div>
</template>

<script setup>
import { useColorStore } from "../../../stores/colors"
import ColorComponent from "./ColorComponent.vue"
import { useRouter } from "vue-router"

// Importa a rotas
const router = useRouter()
// Importa o store de cores
const colorStore = useColorStore()

// Funções para navegação até a tela de login
function goToLogin() {
  router.push("/login")
}

// Funções para navegação até a tela de registro
function goToRegister() {
  router.push("/register")
}
</script>

<style scoped>
/* =================================== CONTAINER ====================================== */
.navbar {
  height: 60px;
  display: flex;
  align-items: center;
  padding: 0 25px;
  transition: 0.3s;
}

/* =================================== TEXT ====================================== */
#logo {
  text-decoration: none;
}

h1 {
  color: white;
  font-size: 20px;
  opacity: 0.9;
  text-decoration: none;
}

h1:hover {
  opacity: 1;
  cursor: pointer;
}

/* =================================== BTN ====================================== */
.btns {
  margin-left: auto;
  display: flex;
  align-items: center;
}

.btn {
  background-color: transparent;
  border: none;
  color: white;
  opacity: 0.9;
  cursor: pointer;
  font-size: 18px;
  padding: 0 20px;
}

.btn:hover {
  opacity: 1;
}

#register-btn {
  border-left: 1px solid white;
  border-right: 1px solid white;
}
</style>
