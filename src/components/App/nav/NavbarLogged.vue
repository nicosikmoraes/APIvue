<template>
  <div class="navbar" :style="{ backgroundColor: colorStore.color }">
    <!-- Navega para Home -->
    <router-link to="/" id="logo">
      <h1 @click="exit()">APIvue</h1>
    </router-link>

    <div class="btns">
      <button id="exit_btn" @click="exit()">Sair</button>
      <UserComponent />

      <ColorComponent />
    </div>
  </div>
</template>

<script setup>
import { useColorStore } from "../../../stores/colors"
import { useNavbarStore } from "@/stores/navbar"
import { useRouter } from "vue-router"
import ColorComponent from "./ColorComponent.vue"
import UserComponent from "./UserComponent.vue"
import { useUsersStore } from "@/stores/users"

// Importa a rotas
const router = useRouter()
// Importa o store de cores
const colorStore = useColorStore()
const navbarStore = useNavbarStore()
const userStore = useUsersStore()

function exit() {
  navbarStore.loggedOut()

  userStore.isAuthenticated = false

  router.push("/")
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

#exit_btn {
  background-color: transparent;
  border: none;
  color: white;
  opacity: 0.9;
  cursor: pointer;
  font-size: 20px;
  padding: 0 15px;
}

#exit_btn:hover {
  opacity: 1;
}

#color-btn {
  width: 30px;
  height: 30px;
  border: none;
  opacity: 0.9;
  cursor: pointer;
  padding: 0 0px;
  margin-left: 20px;
  border-radius: 200px;
}

#color-btn:hover {
  opacity: 1;
  transform: scale(1.1);
}
</style>
