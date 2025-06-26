import { defineStore } from "pinia"
import { ref } from "vue"
import { useColorStore } from "@/stores/colors"

export const useNavbarStore = defineStore(
  "navbar",
  () => {
    const showUnlogged = ref(true)
    const showModal = ref(false)
    const colorStore = useColorStore()

    function logged() {
      showUnlogged.value = false
    }

    function loggedOut() {
      showUnlogged.value = true
    }

    function changeShowModal() {
      showModal.value = !showModal.value

      if (colorStore.showModal === true) {
        colorStore.showModal = false
      }
    }

    return {
      showUnlogged,
      showModal,
      logged,
      loggedOut,
      changeShowModal,
    }
  },
  { persist: true },
) // Persistência do estado usando pinia-plugin-persistedstate
