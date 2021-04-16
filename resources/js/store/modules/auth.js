import getters from './auth/getters'
import mutations from './auth/mutations'
import actions from './auth/actions'
import state from './auth/state'

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}