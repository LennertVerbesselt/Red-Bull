import { createWebHistory, createRouter } from "vue-router";
import Register from "../components/registerForm.vue";
import Login from "../components/loginForm.vue";

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