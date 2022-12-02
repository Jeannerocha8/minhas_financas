import { createApp } from 'vue'
import App from './App.vue'
import './assets/main.css'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import axios from "axios";
axios.defaults.withCredentials = true;
window.axios = axios;

import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons'
import router from './router'

library.add(fas, far, fab);

createApp(App)
    .use(router)
    .component('font-awesome-icon', FontAwesomeIcon)
    .mount('#app')