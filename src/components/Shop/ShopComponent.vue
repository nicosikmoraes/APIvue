<template>
  <div class="data_container">
    <header>
      <BackButton />

      <div class="title">
        <h1>Finalizar compras</h1>
      </div>
    </header>

    <main>
      <ShopTable />
    </main>

    <footer></footer>
  </div>
</template>

<script setup>
import ShopTable from "./ShopTable.vue"
import BackButton from "../config/BackButton.vue"
import { useUsersStore } from "@/stores/users"
import { useCartsStore } from "@/stores/carts"
import { onMounted } from "vue"

const cartStore = useCartsStore()
const userStore = useUsersStore()

onMounted(async () => {
  await cartStore.getCart(userStore.id)
})

function formatPrice(price) {
  return new Intl.NumberFormat("pt-BR", { style: "currency", currency: "BRL" }).format(price)
}
</script>

<style scoped>
/* ============================== CONTAINER ================================================= */
.data_container {
  background-color: #e7e6e6;
  min-height: 40vh;
  width: 600px;
  margin-top: 100px;
  border-radius: 12px;
  display: flex;
  flex-direction: column;
}

/* ============================== HEADER ================================================= */
header {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding: 10px 15px;
  margin-top: 3px;
}

h1 {
  font-size: 21px;
  font-weight: bolder;
  margin-left: 27%;
}

.title {
  width: 90%;
  display: flex;
}
/* ============================== MAIN ================================================= */
main {
  margin-top: 5px;
  flex: 1;
}

/* ============================== LIST ================================================= */
.list {
  list-style: decimal;
  padding: 10px 0;
  margin-left: 40px;
  display: flex;
  flex-direction: column;
  gap: 7px;
}

.list_item {
  font-size: 17px;
  font-style: italic;
  font-weight: 700;
}

/* ============================== FOOTER ================================================= */
footer {
  border: 1px solid black;
  height: 60px;
  margin-top: 15px;
}
</style>
