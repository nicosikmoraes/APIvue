<template>
  <div class="hover_container">
    <a :href="link"><img class="icon" src="/src/assets/images/code-alt.png" /></a>
    <a @click="cartsStore.addCart(userStore.id, id)"
      ><img class="icon" src="/src/assets/images/cart.png"
    /></a>
  </div>
</template>

<script setup>
import { useUsersStore } from "@/stores/users"
import { useCartsStore } from "@/stores/carts"

const userStore = useUsersStore()
const cartsStore = useCartsStore()

defineProps({
  link: String,
  id: Number,
})
</script>

<style scoped>
/*============================== CONTAINER =================================================*/
.hover_container {
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
}

/*============================== IMAGE =================================================*/
.icon {
  width: 45px;
  height: 45px;
  opacity: 1;
  margin-top: 40px;
}

.icon:hover {
  transform: scale(1.1);
}
</style>
