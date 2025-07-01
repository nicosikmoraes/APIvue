import { defineStore } from "pinia"
import axios from "axios"
import { useCartsStore } from "./carts"
import Swal from "sweetalert2"

export const useUpdateUser = defineStore(
  "updateUser",
  () => {
    // ============================== VARIABLES =================================================

    const cartsStore = useCartsStore()

    const api = axios.create({
      baseURL: "http://localhost:8000/backend/update/",
    })

    // ============================== FUNCTIONS =================================================
    async function updateUser(id, column, newValue) {
      try {
        const res = await api.post("update.php", {
          id: id,
          coluna: column,
          novoValor: newValue,
        })

        await cartsStore.fetchUserLogged(id)

        // Exibe alerta de sucesso
        Swal.fire({
          icon: "success",
          title: "Usuário alterado!",
          text: "Usuário alterado com sucesso!",
        })
      } catch (error) {
        console.log(error) // mostrar mensagem de erro
      }
    }
    // ============================== RETURN =================================================
    return {
      updateUser,
    }
  },
  { persist: true },
) // Persistência do estado usando pinia-plugin-persistedstate
