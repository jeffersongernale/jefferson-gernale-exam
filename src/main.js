import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import {  IconsPlugin, BIcon } from 'bootstrap-vue'
import axios from 'axios'

// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'

// Vue.use(BootstrapVue)

axios.defaults.baseURL = 'http://localhost/jefferson-gernale-exam';
Vue.use(IconsPlugin)

Vue.component('BIcon', BIcon)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
