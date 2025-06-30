<template>
  <div class="data_container">
    <header>
      <BackButton />
      <h1>Configurações</h1>
    </header>
    <main>
      <div class="change_name">
        <NameInput />
      </div>
    </main>
  </div>
</template>

<script setup>
import BackButton from "./BackButton.vue"
import NameInput from "./Inputs/NameInput.vue"
import { useUsersStore } from "@/stores/users"

const userStore = useUsersStore()
</script>

<style scoped>
/* ============================== CONTAINER ================================================= */
.data_container {
  background-color: #e7e6e6;
  min-height: 100vh;
  width: 600px;
}

/* ============================== HEADER ================================================= */
header {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding: 7px 10px;
  margin-top: 60px;
  gap: 185px;
}

h1 {
  font-size: 18px;
  font-weight: 550;
}

/* ============================== MAIN ================================================= */
main {
  margin-top: 20px;
}

/* UPDATE NAME */
.change_name {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 3px;
  padding: 0 25px;
}
</style>
