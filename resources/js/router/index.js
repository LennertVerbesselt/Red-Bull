import { createWebHistory, createRouter } from "vue-router";
import Register from "../components/RegisterForm.vue";
import Login from "../components/LoginForm.vue";
import Dashboard from "../views/Dashboard.vue";
import Home from "../views/Home.vue";

const routes = [
  {
    path: "/register",
    name: "Register",
    component: Register,
  },
  {
    path: "/login",
    name: "login",
    component: Login,
  },
  {
    path: "/dash",
    name: "dashboard",
    component: Dashboard,
  },
  {
    path: "/",
    name: "home",
    component: Home,
  },
  


];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;