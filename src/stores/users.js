import { defineStore } from "pinia"
import { ref } from "vue"

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
    // get users from the database
    async function fetchUsers() {
      // Fetch users from the Database
      const res = await fetch("http://localhost:8000/api.php")

      // Populate the users array with the response data
      users.value = await res.json()
    }

    // ============================== REGISTER USER =================================================
    // Add a new user to the database
    async function addUser(newName, newEmail, newPassword) {
      // Call the updateDb function to update the database
      await updateDb(newName, newEmail, newPassword)

      // Call the fetchUsers function to get the new users from the database
      await fetchUsers()
    }

    // Update the database with the new user data
    async function updateDb(newName, newEmail, newPassword) {
      // Get the path to the register.php file
      const res = await fetch("http://localhost:8000/register.php", {
        // Send a POST request to the register.php file
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        // Send the user data as a JSON object
        body: JSON.stringify({
          nome: newName,
          email: newEmail,
          senha: newPassword,
        }),
      })

      // Verifica se a resposta foi bem-sucedida
      if (!res.ok) {
        const errorData = await res.json()
        throw new Error(errorData.erro)
      }

      const data = await res.json()

      // Preenche os valores reativos com os dados do usuário
      name.value = data.user.nome
      email.value = data.user.email
      password.value = data.user.senha
      id.value = data.user.id
      cart_itens.value = data.user.itens_carrinho

      return data.user // <-- importante retornar
    }

    // ============================== LOGIN USER =================================================
    // Function to log in a user
    async function loginUser(newEmail, newPassword) {
      // Use the login.php file to log in the user
      const res = await fetch("http://localhost:8000/login.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          email: newEmail,
          senha: newPassword,
        }),
      })

      // Verifica se a resposta foi bem-sucedida
      if (!res.ok) {
        const errorData = await res.json()
        throw new Error(errorData.erro)
      }

      const data = await res.json()

      // Preenche os valores reativos com os dados do usuário
      name.value = data.user.nome
      email.value = data.user.email
      password.value = data.user.senha
      id.value = data.user.id
      cart_itens.value = data.user.itens_carrinho

      return data.user // <-- importante retornar
    }

    // ============================== DELETE USER =================================================
    async function deleteUser(id) {
      // Use the delete.php file to delete the user
      const res = await fetch("http://localhost:8000/delete.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id: id,
        }),
      })

      // Check if the request was successful
      const data = await res.json()

      // Alert the user if the request was successful
      alert("Usuário excluído com sucesso!")

      // Fetch the users again
      await fetchUsers()
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
