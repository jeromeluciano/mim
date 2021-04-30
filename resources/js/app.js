import 'bootstrap'
import Vue from 'vue'
import router from './router/index'
import App from './App.vue'
import store from './store/index'
import axios from 'axios'
import VueToastr from 'vue-toastr'

Vue.use(VueToastr)

axios.defaults.withCredentials = true
axios.defaults.baseURL = process.env.APP_URL

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

store.dispatch('auth/me').then(() => {
    new Vue({
        router,
        store,
        render: h => h(App)
    }).$mount('#app');
})

