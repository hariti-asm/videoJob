import './bootstrap';
import { createApp } from 'vue'
 
const app = createApp()
import SearchComponent from './components/SearchComponent.vue';
app.component('search-component', SearchComponent);

app.mount('#app')



