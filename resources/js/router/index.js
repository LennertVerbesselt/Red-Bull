import { createWebHistory, createRouter } from "vue-router";

import Login from "../components/LoginForm.vue";

import Register from "../components/RegisterForm.vue";
import Survey from "../views/Survey.vue";

import Dashboard from "../views/Dashboard.vue";
import Home from "../views/Home.vue";
import Challenges from "../views/Challenges.vue";
import Leaderboards from "../views/Leaderboards.vue";
import QRScanner from "../views/QRScanner.vue";
import Events from "../views/Events.vue";
import Profile from "../views/Profile.vue";

import AllBadges from "../components/Profile/AllBadges.vue";
import ProfileStatistics from "../components/Profile/ProfileStatistics.vue";

import Upload from "../views/Upload.vue";
import ChallengeQRScanner from "../components/Challenges/ChallengeQRScanner.vue";
import ChallengeSetOverview from "../components/Challenges/ChallengeSetOverview.vue";

import Explanation from "../views/Explanation.vue";
import Introduction from "../views/Introduction.vue";


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
    path: "/challengeset",
    name: "ChallengeSet",
    component: ChallengeSetOverview,
    props: true,
    meta: {
      enterClass: 'animate__animated animate__fadeInLeft',
      leaveClass: 'animate__animated animate__fadeOutRight'
    }
  },
  {
    path: "/qrscanner",
    name: "QRScanner",
    component: QRScanner,
  },
  {
    path: "/events",
    name: "Events",
    component: Events,
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/allbadges",
    name: "AllBadges",
    component: AllBadges,
  },
  {
    path: "/profilestatistics",
    name: "ProfileStatistics",
    component: ProfileStatistics,
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

  {
    path: "/survey",
    name: "Survey",
    component: Survey,
  },
  {
    path: "/introduction",
    name: "Introduction",
    component: Introduction,
  },
  {
    path: "/explanation",
    name: "Explanation",
    component: Explanation,
  },
  
  


];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;