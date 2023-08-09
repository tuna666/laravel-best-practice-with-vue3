import './bootstrap';
import App from './App.vue';
import { createApp } from 'vue';
const app = createApp(App);
console.log(app.version);
app.mount('#app');
