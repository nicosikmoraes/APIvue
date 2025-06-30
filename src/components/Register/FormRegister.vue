<template>
  <div class="form-login">
    <form>
      <!-- Input nome -->
      <input
        type="text"
        placeholder="Nome"
        :style="{ borderColor: colorStore.color }"
        v-model="name"
        @blur="touchedName = true"
      />
      <!-- Mensagem de erro -->
      <p v-if="touchedName && validName === false">Nome inválido</p>

      <!-- Input email -->
      <input
        type="text"
        placeholder="Email"
        :style="{ borderColor: colorStore.color }"
        v-model="email"
        @blur="touchedEmail = true"
      />
      <!-- Mensagem de erro -->
      <p v-if="touchedEmail && validEmail === false">Email inválido</p>

      <!-- Input senha -->
      <input
        type="password"
        placeholder="Senha"
        :style="{ borderColor: colorStore.color }"
        v-model="password"
      />

      <!-- BTN -->
      <button
        :disabled="!validName || !validEmail || !validPassword"
        @click="sendData"
        type="button"
        :style="{
          backgroundColor: colorStore.color,
          cursor: validName && validEmail && validPassword ? 'pointer' : 'not-allowed',
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
import Swal from "sweetalert2"

// ============================== VARIABLES =================================================

// Importa o store de cores
const colorStore = useColorStore()
const userStore = useUsersStore()
const navbarStore = useNavbarStore()
const router = useRouter()

//Variáveis reativas para os campos do formulário
const name = ref("")
const email = ref("")
const password = ref("")

// ============================== VALIDATIONS =================================================

// Variáveis reativas para controle de toque nos campos
const touchedName = ref(false)
const touchedEmail = ref(false)

// Retorna se a senha é válida
const validPassword = computed(() => {
  return password.value.trim() !== ""
})

// Retorna se o email é válido
const validEmail = computed(() => {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return regex.test(email.value.trim())
})

// Retorna se o nome é válido
const validName = computed(() => {
  return name.value.trim() !== ""
})

// ============================== FUNCTIONS =================================================

// Função para enviar os dados do formulário
async function sendData() {
  try {
    // Chama a função do store para adicionar o usuário
    await userStore.addUser(name.value, email.value, password.value)

    // Limpa os campos do formulário
    name.value = ""
    email.value = ""
    password.value = ""

    console.log(navbarStore) // deve mostrar o objeto da store
    console.log(typeof navbarStore.logged)

    userStore.isAuthenticated = true
    navbarStore.logged()

    //Ir para a página principal após o envio dos dados
    router.push("/main")
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Erro ao cadastrar",
      text: "Uma conta já existe com esse email",
    })
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

/* ========================== TEXT =============================== */
p {
  color: red;
  font-size: 13px;
  margin-top: -12px;
  align-self: flex-start;
  margin-left: 8px;
  margin-bottom: 0;
}
</style>
