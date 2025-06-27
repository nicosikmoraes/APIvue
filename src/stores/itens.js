import { defineStore } from "pinia"
import axios from "axios"
import { ref } from "vue"

export const useItensStore = defineStore(
  "itens",
  () => {
    // ============================== VARIABLES =================================================

    const itens = ref([])

    // ============================== FUNCTIONS =================================================

    async function fetchItens() {
      // Get the itens from the database using axios
      const res = await axios.get("http://localhost:8000/itens.php")

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
