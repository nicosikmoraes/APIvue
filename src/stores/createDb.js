import { defineStore } from "pinia"
import axios from "axios"
import { ref } from "vue"

export const useDbStore = defineStore(
  "db",
  () => {
    // ============================== VARIABLES =================================================

    const api = axios.create({
      baseURL: "http://localhost:8000/backend/",
    })

    // ============================== FUNCTIONS =================================================

    // Função para criar o banco de dados
    async function createDb() {
      try {
        const res = await api.get("database/createDb.php")
      } catch (error) {
        console.log(error) // mostrar mensagem de erro
      }
    }

    async function createTables() {
      try {
        const res = await api.get("database/createTables.php")

        insertItens() // Inserir dados
      } catch (error) {
        console.log(error) // mostrar mensagem de erro
      }
    }

    async function insertItens() {
      try {
        const res = await api.get("database/insertItens.php")
      } catch (error) {
        console.log(error) // mostrar mensagem de erro
      }
    }

    // ============================== RETURN =================================================
    return {
      createDb,
      createTables,
      insertItens,
    }
  },
  { persist: true },
) // Persistência do estado usando pinia-plugin-persistedstate
