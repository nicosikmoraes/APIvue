import { defineStore } from "pinia"
import axios from "axios"
import { ref } from "vue"

export const useItensStore = defineStore(
  "itens",
  () => {
    // ============================== VARIABLES =================================================

    const itens = ref([])

    const api = axios.create({
      baseURL: "http://localhost:8000/backend/",
    })

    // ============================== FUNCTIONS =================================================

    async function fetchItens() {
      // Get the itens from the database using axios
      const res = await api.get("itens.php")

      // Populate the itens array with the response data
      itens.value = res.data
    }

    // ============================== RETURN =================================================
    return {
      itens,
      fetchItens,
    }
  },
  { persist: true },
) // Persistência do estado usando pinia-plugin-persistedstate
