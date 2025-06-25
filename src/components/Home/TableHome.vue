<template>
  <div class="container-table">
    <!-- Isso mostra o conteúdo do array -->
    <table class="table">
      <thead :style="{ backgroundColor: colorStore.color }">
        <tr>
          <th :style="{ border: '1px solid ' + colorStore.color }">ID</th>
          <th :style="{ border: '1px solid ' + colorStore.color }">Nome</th>
          <th :style="{ border: '1px solid ' + colorStore.color }">Email</th>
          <th :style="{ border: '1px solid ' + colorStore.color }"></th>
        </tr>
      </thead>
      <tbody>
        <tr class="line" v-for="user in userStore.users" :key="user.id" :style="{ color: colorStore.color }">
          <td class="text" :style="{ border: '1px solid ' + colorStore.color }">{{ user.id }}</td>
          <td class="text" :style="{ border: '1px solid ' + colorStore.color }">{{ user.nome }}</td>
          <td class="text" :style="{ border: '1px solid ' + colorStore.color }">{{ user.email }}</td>
          <td :style="{ border: '1px solid ' + colorStore.color }" @click="userStore.deleteUser(user.id)">
            <img src="/src/assets/images/trash.png" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { useColorStore } from "@/stores/colors"
import { onMounted, ref } from "vue"
import { useUsersStore } from "@/stores/users"

const colorStore = useColorStore()
const userStore = useUsersStore()

onMounted(async () => {
  // Fetch users when the component is mounted
  await userStore.fetchUsers()
  console.log("Users fetched:", userStore.users)
})
</script>

<style scoped>
/* ========================== TEXT ================================= */
th {
  font-size: 16px;
}

.text {
  font-size: 17px;
  font-weight: 400;
  transition: 0.3s;
}

/* ========================== TABLE ================================= */
.table {
  width: 100%;
  margin-top: 20px;
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
  padding: 8px 15px;
  transition: 0.3s;
}

/* TABLE BODY */
td {
  text-align: center;
  padding: 5px 15px;
  transition: 0.3s;
}

tbody tr:hover {
  background-color: #f1f1f1;
  cursor: pointer;
}

/* ========================== IMAGE ================================= */
img {
  height: 25px;
  margin-top: 5px;
}

img:hover {
  cursor: pointer;
  transform: scale(1.15);
}
</style>
