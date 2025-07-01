<template>
  <div class="container-table">
    <!-- Isso mostra o conteúdo do array -->
    <table class="table">
      <thead :style="{ color: colorStore.color }">
        <tr :style="{ borderBottom: '1px solid ' + colorStore.color }">
          <th>Id</th>
          <th>Aplicação</th>
          <th>Valor</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr
          class="line"
          v-for="item in cartStore.carts.itens"
          :key="item.id"
          :style="{ color: colorStore.color, borderBottom: '1px solid ' + colorStore.color }"
        >
          <td class="text">{{ item.id }}.</td>
          <td class="text">{{ item.titulo }}</td>
          <td class="text">
            {{ formatPrice(item.valor) }}
          </td>
          <td>
            <img src="/src/assets/images/trash.png" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { useColorStore } from "@/stores/colors"
import { useUsersStore } from "@/stores/users"
import { useCartsStore } from "@/stores/carts"

const colorStore = useColorStore()
const userStore = useUsersStore()
const cartStore = useCartsStore()

function formatPrice(price) {
  return new Intl.NumberFormat("pt-BR", { style: "currency", currency: "BRL" }).format(price)
}
</script>

<style scoped>
.container-table {
  width: 55%;
  margin-left: 15px;
}

/* ========================== TEXT ================================= */
th {
  font-size: 17px;
}

.text {
  font-size: 16px;
  font-weight: 400;
  transition: 0.3s;
}

/* ========================== TABLE ================================= */
.table {
  width: 100%;
  border-collapse: collapse;
  transition: 0.3s;
}

/* TABLE HEADER */
thead {
  color: white;
  transition: 0.3s;
}

th {
  text-align: center;
  padding: 9px 16px;
  transition: 0.3s;
}

/* TABLE BODY */
td {
  text-align: center;
  padding: 6px 10px;
  transition: 0.3s;
}

tbody tr:hover {
  background-color: #f1f1f1;
  cursor: pointer;
}

/* ========================== IMAGE ================================= */
img {
  height: 23px;
  margin-top: 5px;
}

img:hover {
  cursor: pointer;
  transform: scale(1.15);
}
</style>
