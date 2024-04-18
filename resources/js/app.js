import App from './App.vue';
import './bootstrap';
import { createApp } from 'vue';
import router from "./routes.js";
import swal from 'sweetalert';



// console.log(router)
const app = createApp(App);
app.use(router)

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

app.mount('#app');
