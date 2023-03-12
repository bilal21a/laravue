import './bootstrap';

import { createApp } from 'vue';
import router from './router';
import app from './layout/app.vue';
import store from "./store";
createApp(app)
    .use(router)
    .use(store)
    .mount('#app');