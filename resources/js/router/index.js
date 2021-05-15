import { createWebHistory, createRouter } from "vue-router";
import Register from "../components/RegisterForm.vue";
import Login from "../components/LoginForm.vue";

const routes = [
  {
    path: "/register",
    name: "Register",
    component: Register,
  },
  {
    path: "/",
    name: "login",
    component: Login,
  },

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;