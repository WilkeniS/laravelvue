import { createApp } from 'vue';
import App from './App.vue';
import axios from 'axios';
import {createWebHistory, createRouter} from 'vue-router';
import { routes } from './routes';

const Vue = createApp(App);

const router = new createRouter({
    history: createWebHistory(), 
    routes: routes
});

Vue.use(router);


Vue.mount("#app");

axios.defaults.baseURL="http://127.0.0.1:8000"

// const app = new Vue ({
//     el: '#app',
//     router:router,
//     render: h => h(App)
// });
