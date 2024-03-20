import './bootstrap';
import { createApp } from "vue/dist/vue.esm-bundler";
 
const app = createApp()
app.component('search-component', SearchComponent);
import SearchComponent from './components/SearchComponent.vue';

app.mount('#app')



