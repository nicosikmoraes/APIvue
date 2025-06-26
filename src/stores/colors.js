import { defineStore } from "pinia"
import { ref } from "vue"
import { useNavbarStore } from "@/stores/navbar"

export const useColorStore = defineStore(
  "colors",
  () => {
    const color = ref("#171f40")
    const btnColor = ref("#303f7e")
    const showModal = ref(false)
    const navbarStore = useNavbarStore()

    // Fecha ou abre o modal
    function changeShowModal() {
      this.showModal = !this.showModal

      if (navbarStore.showModal === true) {
        navbarStore.showModal = false
      }
    }

    // Altera a cor principal e a cor do botão
    function changeMainColor(mainColor, btnColor) {
      this.color = mainColor
      this.btnColor = btnColor
    }

    return {
      color,
      btnColor,
      showModal,
      changeShowModal,
      changeMainColor,
    }
  },
  { persist: true },
) // Persistência do estado usando pinia-plugin-persistedstate
