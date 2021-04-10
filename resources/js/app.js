import 'bootstrap'
import Vue from 'vue'
import router from './router/index'
import App from './App.vue'
import store from './store/index'
const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
