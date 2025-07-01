<template>
  <div class="container_p">
    <p>Alterar email:</p>
    <div class="input_container">
      <input
        class="input"
        type="text"
        placeholder="Digite o novo email"
        v-model="email"
        :style="{ borderColor: colorStore.color }"
      />
      <button
        class="btn"
        :style="{
          backgroundColor: colorStore.color,
        }"
        @click="updateUser.updateUser(userStore.id, 'email', email)"
      >
        Alterar
      </button>
    </div>
  </div>
</template>

<script setup>
import { useUsersStore } from "@/stores/users"
import { useColorStore } from "@/stores/colors"
import { useUpdateUser } from "@/stores/updateUser"

const colorStore = useColorStore()
const userStore = useUsersStore()
const updateUser = useUpdateUser()

const email = userStore.email
</script>

<style scoped>
.input_container {
  display: flex;
  align-items: center;
  gap: 14px;
}

.container_p {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 3px;
}

p {
  font-size: 15px;
  font-style: italic;
  margin-left: 4px;
}

.input {
  border-radius: 2px;
  border: 1px solid;
  transition: 0.3s;
  padding: 4px 12px;
}

.btn {
  border: none;
  padding: 6px 14px;
  border-radius: 6px;
  color: white;
  font-weight: 600;
  opacity: 0.9;
  width: 100%;
  transition: 0.3s;
  cursor: pointer;
}

.btn:hover {
  opacity: 1;
  transform: scale(1.05);
}
</style>
