<template>
  <p>Alterar nome:</p>
  <div class="input_container">
    <input
      class="name_input"
      type="text"
      placeholder="Digite o novo nome"
      v-model="userStore.name"
      :style="{ borderColor: colorStore.color }"
    />
    <button
      class="name_btn"
      :style="{
        backgroundColor: colorStore.color,
      }"
    >
      Alterar
    </button>
  </div>
</template>

<script setup>
import { useUsersStore } from "@/stores/users"
import { useColorStore } from "@/stores/colors"

const colorStore = useColorStore()
const userStore = useUsersStore()
</script>

<style scoped>
.input_container {
  display: flex;
  align-items: center;
  gap: 14px;
}

p {
  font-size: 15px;
  font-style: italic;
  margin-left: 4px;
}

.name_input {
  border-radius: 2px;
  border: 1px solid;
  transition: 0.3s;
  padding: 4px 12px;
}

.name_btn {
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

.name_btn:hover {
  opacity: 1;
  transform: scale(1.05);
}
</style>
