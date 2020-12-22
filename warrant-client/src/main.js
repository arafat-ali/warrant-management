import Vue from 'vue';
import App from './App.vue';
import router from './router';

import axios from 'axios'
import API from './config/API'
import store from './config/Store'

import env from './config/env'

import '@/assets/css/tailwind.css'
import VueSweetalert2 from 'vue-sweetalert2';
 
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
axios.defaults.baseURL = env.baseURL

Vue.use(require('vue-moment'));
Vue.use(VueSweetalert2);
// let access_token = localStorage.getItem('token');
let access_token = store.getters.getAccessToken ? store.getters.getAccessToken.access_token : null;

if (access_token)
  axios.defaults.headers.common['Authorization'] = `Bearer ${access_token}`;

window.axios = axios
window.API = API
window.store = store

Vue.config.productionTip = false


new Vue({
  render: h => h(App),
  components: { App },
  router,
  store
}).$mount('#app')
