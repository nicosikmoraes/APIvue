import { defineStore } from "pinia"
import { ref } from "vue"

export const useUsersStore = defineStore("users", () => {
  // ============================== VARIABLES =================================================

  const users = ref([])

  //Variables for the register form
  const name = ref("")
  const email = ref("")
  const password = ref("")

  // ============================== FUNCTIONS =================================================

  // ============================== GET USERS =================================================
  // get users from the database
  async function fetchUsers() {
    // Fetch users from the Database
    const res = await fetch("http://localhost:8000/api.php")
    console.log(res)

    // Populate the users array with the response data
    users.value = await res.json()
  }

  // ============================== REGISTER USER =================================================
  // Add a new user to the database
  async function addUser(newName, newEmail, newPassword) {
    // Populate the name, email, and password variables with the new user data
    name.value = newName
    email.value = newEmail
    password.value = newPassword

    // Call the updateDb function to update the database
    await updateDb()

    // Call the fetchUsers function to get the new users from the database
    await fetchUsers()
  }

  // Update the database with the new user data
  async function updateDb() {
    // Get the path to the register.php file
    await fetch("http://localhost:8000/register.php", {
      // Send a POST request to the register.php file
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      // Send the user data as a JSON object
      body: JSON.stringify({
        nome: name.value,
        email: email.value,
        senha: password.value,
      }),
    })
  }

  // ============================== LOGIN USER =================================================
  // Function to log in a user
  async function loginUser(newEmail, newPassword) {
    // Use the login.php file to log in the user
    return await fetch("http://localhost:8000/login.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        email: newEmail,
        senha: newPassword,
      }),
    })
      .then(async (res) => {
        if (!res.ok) {
          // If the response is not ok, throw an error
          const err = await res.json()
          throw new Error(err.erro || "Erro no login")
        }
        // If the response is ok, return the response data
        return res.json()
      })
      .then((data) => {
        // Populate the name, email, and password variables with the user data
        name.value = data.user.nome
        email.value = data.user.email
        password.value = data.user.senha

        // Log the user data to the console
        console.log("data: ", data)

        // Return the data
        return data
      })
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
    fetchUsers,
    addUser,
    updateDb,
    loginUser,
    deleteUser,
  }
})
