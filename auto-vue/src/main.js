import './assets/main.css'
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import Toast from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const app = createApp(App)
app.component('QuillEditor', QuillEditor)



app.use(router)
app.use(Toast);
app.mount('#app')
