import getters from './auth/getters'
import mutations from './auth/mutations'
import actions from './auth/actions'

export  default {
  namespaced: true,
  state: {
    authenticated: false,
    user: null,
    isLoginModalOpen: false,
    stories: []
  },
  getters,
  mutations,
  actions
}