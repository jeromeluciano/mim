import Vue from 'vue'
import Vuex from 'vuex'
import navbar from './modules/navbar'
import auth from './modules/auth'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    navbar,
    auth
  }
})
