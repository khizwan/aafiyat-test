import { createApp } from 'vue';
import FormComponent from './components/FormComponent.vue';
import TableComponent from './components/TableComponent.vue';

const app = createApp({});
app.component('form-component', FormComponent);
app.component('table-component', TableComponent);
app.mount('#app');
