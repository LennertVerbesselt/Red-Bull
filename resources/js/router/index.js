import { createWebHistory, createRouter } from "vue-router";

import Login from "../components/LoginForm.vue";

import Register from "../components/RegisterForm.vue";
import UserInterestSurvey from "../views/UserInterestSurvey.vue";

import Dashboard from "../views/Dashboard.vue";
import Home from "../views/Home.vue";
import Challenges from "../views/Challenges.vue";
import Leaderboards from "../views/Leaderboards.vue";
import QRScanner from "../views/QRScanner.vue";
import Events from "../views/Events.vue";
import Profile from "../views/Profile.vue";

import Upload from "../views/Upload.vue";
import ChallengeQRScanner from "../components/Challenges/ChallengeQRScanner.vue";


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
  {
    path: "/challenges",
    name: "Challenges",
    component: Challenges,
  },
  {
    path: "/qrscanner",
    name: "QRScanner",
    component: QRScanner,
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/upload",
    name: "Upload",
    component: Upload,
    props: true,
  },

  {
    path: "/challengeqrscanner",
    name: "ChallengeQRScanner",
    component: ChallengeQRScanner,
    props: true,
  },
  
  


];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;