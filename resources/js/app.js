require('./bootstrap');
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import VueAgile from 'vue-agile';
import QrReader from 'vue3-qr-reader';
import veProgress from "vue-ellipse-progress";
import VueFinalModal from 'vue-final-modal'


createApp(App).use(router).mount("#app").use(VueAgile).use(QrReader).use(veProgress).use(VueFinalModal());
