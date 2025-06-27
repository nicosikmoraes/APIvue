import { defineStore } from "pinia"
import axios from "axios"
import { ref } from "vue"

export const useCartsStore = defineStore(
  "carts",
  () => {
    // ============================== VARIABLES =================================================

    const carts = ref([])

    // ============================== FUNCTIONS =================================================

    async function addCart(newUserId, newItemId) {
      // Get the carts from the database using axios
      const res = await axios.post("http://localhost:8000/addCart.php", {
        user_id: newUserId,
        item_id: newItemId,
      })
      console.log(res.data)
    }

    // ============================== RETURN =================================================
    return {
      carts,
      addCart,
    }
  },
  { persist: true },
) // Persistência do estado usando pinia-plugin-persistedstate
