import { defineStore } from "pinia"
import { ref } from "vue"
import Swal from "sweetalert2"
import axios from "axios"

export const useUsersStore = defineStore(
  "users",
  () => {
    // ============================== VARIABLES =================================================

    const users = ref([])

    const isAuthenticated = ref(false)

    //Variables for the register form
    const name = ref("")
    const email = ref("")
    const password = ref("")
    const id = ref("")
    const cart_itens = ref(0)

    // ============================== FUNCTIONS =================================================

    // ============================== GET USERS =================================================
    // Pegar TODOS os usuários da base de dados
    async function fetchUsers() {
      const res = await axios.get("http://localhost:8000/api.php")
      users.value = res.data // Popula o array com os dados do usuário
    }

    // ============================== REGISTER USER =================================================
    // Vou registrar um novo usuário
    async function addUser(newName, newEmail, newPassword) {
      await updateDb(newName, newEmail, newPassword) // Atualiza o banco de dados

      await fetchUsers() // Atualiza o array com os dados do novo usuário
    }

    // Update the database with the new user data
    async function updateDb(newName, newEmail, newPassword) {
      try {
        const res = await axios.post("http://localhost:8000/register.php", {
          nome: newName,
          email: newEmail,
          senha: newPassword,
        })

        //Os dados retornados pelo backend
        const data = res.data

        // Preenche os valores reativos com os dados do usuário
        name.value = data.user.nome
        email.value = data.user.email
        password.value = data.user.senha
        id.value = data.user.id
        cart_itens.value = data.user.itens_carrinho
      } catch (error) {
        // axios já trata erros HTTP aqui
        const errorMessage = error.response?.data?.erro
        throw new Error(errorMessage)
      }
    }

    // ============================== LOGIN USER =================================================
    // Function to log in a user
    async function loginUser(newEmail, newPassword) {
      try {
        // Envia os dados para login.php
        const res = await axios.post("http://localhost:8000/login.php", {
          email: newEmail,
          senha: newPassword,
        })

        //Os dados retornados pelo backend
        const data = res.data

        // Preenche os valores reativos com os dados do usuário
        name.value = data.user.nome
        email.value = data.user.email
        password.value = data.user.senha
        id.value = data.user.id
        cart_itens.value = data.user.itens_carrinho
      } catch (error) {
        // Trata o erro retornado do servidor
        const errorMessage = error.response?.data?.erro
        throw new Error(errorMessage)
      }
    }

    // ============================== DELETE USER =================================================
    async function deleteUser(id) {
      try {
        // Envia requisição para deletar o usuário
        const res = await axios.post("http://localhost:8000/delete.php", {
          id: id,
        })

        // Exibe alerta de sucesso
        Swal.fire({
          icon: "success",
          title: "Conta deletada!",
          text: "Usuário deletado com sucesso!",
        })

        // Recarrega a lista de usuários
        await fetchUsers()
      } catch (error) {
        // Trata erros (exibe alerta com a mensagem do servidor)
        Swal.fire({
          icon: "error",
          title: "Erro ao deletar",
          text: error.response?.data?.erro,
        })
      }
    }

    // ============================== RETURN =================================================
    return {
      users,
      name,
      email,
      password,
      isAuthenticated,
      id,
      cart_itens,
      fetchUsers,
      addUser,
      updateDb,
      loginUser,
      deleteUser,
    }
  },
  { persist: true },
)
