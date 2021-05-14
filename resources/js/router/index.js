import { createWebHistory, createRouter } from "vue-router";
import Register from "../components/registerForm.vue";

const routes = [
  {
    path: "/register",
    name: "Register",
    component: Register,
  },

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;