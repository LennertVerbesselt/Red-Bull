require('./bootstrap');
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import VueAgile from 'vue-agile';
import VueQrcodeReader from "vue3-qrcode-reader";


createApp(App).use(router).mount("#app").use(VueAgile).use(VueQrcodeReader);
