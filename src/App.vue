<template>
  <div class="container">
    <div class="header">
      <Navbar v-if="navbarStore.showUnlogged" />
      <NavbarLogged v-else />
    </div>

    <router-view />

    <div class="footer">
      <Footer></Footer>
    </div>
  </div>
</template>

<script setup>
import Navbar from "./components/App/nav/Navbar.vue"
import NavbarLogged from "./components/App/nav/NavbarLogged.vue"
import Footer from "./components/App/Footer.vue"
import { useNavbarStore } from "./stores/navbar"
import { useUsersStore } from "./stores/users"
import { useRouter } from "vue-router"
import { onMounted } from "vue"
import { useDbStore } from "./stores/createDb"

const navbarStore = useNavbarStore()
const userStore = useUsersStore()
const router = useRouter()
const dbStore = useDbStore()

onMounted(() => {
  //Cria o banco de dados e as tabelas
  dbStore.createDb()
  dbStore.createTables()

  // Verifica se o usuário está logado
  if (userStore.isAuthenticated) {
    router.push("/main")
  }
})
</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  line-height: 1.6;
  font-family:
    Inter,
    -apple-system,
    BlinkMacSystemFont,
    "Segoe UI",
    Roboto,
    Oxygen,
    Ubuntu,
    Cantarell,
    "Fira Sans",
    "Droid Sans",
    "Helvetica Neue",
    sans-serif;
  font-size: 15px;
  text-rendering: optimizeLegibility;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.container {
  min-height: 100vh;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.footer {
  position: fixed;
  bottom: 0;
}

.header {
  position: absolute;
  top: 0;
  width: 100%;
}
</style>
