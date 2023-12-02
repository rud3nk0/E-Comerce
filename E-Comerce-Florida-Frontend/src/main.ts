import './assets/main.css'

import { createApp } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import { createPinia } from 'pinia'


// @ts-ignore
import App from "./App.vue"
import router from './router'

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')