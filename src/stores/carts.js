import { defineStore } from "pinia"
import axios from "axios"
import { ref } from "vue"
import { useUsersStore } from "./users"

export const useCartsStore = defineStore(
  "carts",
  () => {
    // ============================== VARIABLES =================================================

    const carts = ref([])
    const userStore = useUsersStore()

    // ============================== FUNCTIONS =================================================

    async function addCart(newUserId, newItemId) {
      // Get the carts from the database using axios
      const res = await axios.post("http://localhost:8000/addCart.php", {
        user_id: newUserId,
        item_id: newItemId,
      })
      //Fala "Item adicionado ao carrinho com sucesso!"
      console.log(res.data)

      fetchUserLogged(newUserId)
    }

    // FUNCTION TO FETCH USER LOGGED TO UPDATE CART
    async function fetchUserLogged(userId) {
      const res = await axios.post("http://localhost:8000/fetchUserLog.php", {
        user_id: userId,
      })

      const data = await res.data

      userStore.cart_itens = data.user.itens_carrinho
    }

    // ============================== RETURN =================================================
    return {
      carts,
      addCart,
      fetchUserLogged,
    }
  },
  { persist: true },
) // Persistência do estado usando pinia-plugin-persistedstate
