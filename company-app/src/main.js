import { createApp } from "vue";
import App from "./App.vue";
import axios from "axios";

createApp(App).mount("#app");
axios.defaults.baseURL = "http://127.0.0.1:8000/api";
