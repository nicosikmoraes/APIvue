<template>
  <div class="form-login">
    <form>
      <!-- Input email -->
      <input
        type="text"
        placeholder="Email"
        :style="{ borderColor: colorStore.color }"
        v-model="email"
        @blur="touchedEmail = true"
      />

      <!-- Input senha -->
      <input
        type="password"
        placeholder="Senha"
        :style="{ borderColor: colorStore.color }"
        v-model="password"
      />

      <!-- BTN -->
      <button
        @click="checkLogin()"
        type="button"
        :style="{
          backgroundColor: colorStore.color,
          cursor: buttonDisabled ? 'pointer' : 'not-allowed',
        }"
      >
        Entrar
      </button>
    </form>
  </div>
</template>

<script setup>
import { useColorStore } from "@/stores/colors"
import { ref, computed } from "vue"
import { useUsersStore } from "@/stores/users"
import { useRouter } from "vue-router"
import { useNavbarStore } from "@/stores/navbar"

// Variáveis reativas para os campos do formulário
const email = ref("")
const password = ref("")
const touchedEmail = ref(false)

// Importa o store de cores
const colorStore = useColorStore()
const userStore = useUsersStore()
const navbarStore = useNavbarStore()
const router = useRouter()

// Habilita o botão
const buttonDisabled = computed(() => {
  return validEmail === true || password.value.trim() !== ""
})

// Validação do email
const validEmail = computed(() => {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return regex.test(email.value.trim())
})

/* ========================== FUNCTIONS =============================== */
async function checkLogin() {
  try {
    await userStore.loginUser(email.value, password.value)

    userStore.isAuthenticated = true
    navbarStore.logged()

    router.push("/main")
  } catch (error) {
    alert("Email ou senha inválidos.")
  }
}
</script>

<style scoped>
/* ========================== FORM =============================== */
form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 15px;
}

input {
  padding: 8px 16px;
  border-radius: 6px;
  border: 2px solid;
  transition: 0.3s;
}

/* ========================== BTN =============================== */
button {
  border: none;
  padding: 9px 16px;
  border-radius: 6px;
  color: white;
  font-weight: 600;
  opacity: 0.9;
  width: 100%;
  transition: 0.3s;
}

button:hover {
  opacity: 1;
}
</style>
