<template>
  <div class="data_container">
    <header>
      <BackButton />

      <div class="title">
        <h1>Configurações</h1>
      </div>
    </header>
    <main>
      <div class="change_name">
        <NameInput />
        <EmailInput />
        <PasswordInput />
      </div>
    </main>
  </div>
</template>

<script setup>
import BackButton from "./BackButton.vue"
import NameInput from "./Inputs/NameInput.vue"
import EmailInput from "./Inputs/EmailInput.vue"
import PasswordInput from "./Inputs/PasswordInput.vue"
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

.title {
  width: 90%;
  display: flex;
}
/* ============================== HEADER ================================================= */
header {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding: 10px 15px;
  margin-top: 60px;
}

h1 {
  font-size: 21px;
  font-weight: bolder;
  margin-left: 27%;
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
  gap: 25px;
  padding: 0 25px;
}
</style>
