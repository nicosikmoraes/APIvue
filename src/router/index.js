import { createRouter, createWebHistory } from "vue-router"
import HomeView from "../views/HomeView.vue"
import LoginView from "@/views/LoginView.vue"
import RegisterView from "@/views/RegisterView.vue"
import MainView from "@/views/MainView.vue"
import { useUsersStore } from "@/stores/users"
import ConfigView from "@/views/ConfigView.vue"

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
      meta: {
        title: "Home",
      },
    },
    {
      path: "/login",
      name: "login",
      component: LoginView,
    },
    {
      path: "/register",
      name: "register",
      component: RegisterView,
    },
    {
      path: "/main",
      name: "main",
      component: MainView,
      meta: { requiresAuth: true },
    },
    {
      path: "/config",
      name: "config",
      component: ConfigView,
      meta: { requiresAuth: true },
    },
  ],
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title || "ApiVue"
  next()
})

router.beforeEach((to, from, next) => {
  const userStore = useUsersStore()
  if (to.meta.requiresAuth && !userStore.isAuthenticated) {
    next("/")
  } else {
    next()
  }
})

export default router
