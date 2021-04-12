import axios from 'axios'
export default {
  toggleLoginModal ({ commit, state }) {
    commit('SET_LOGIN_MODAL_STATE', !state.isLoginModalOpen)
  },
  async signIn ({ dispatch }, credentials) {
    await axios.get('/sanctum/csrf-cookie')
    await axios.post('/api/login', credentials)

    return dispatch('me')
  },
  async signOut ({ dispatch }) {
    await axios.delete('/api/logout')

    return dispatch('me')
  },
  me ({ commit }) {
    return axios.get('/api/user')
        .then(response => {
            commit('SET_AUTHENTICATED', true)
            commit('SET_USER', response.data)
        })
        .catch( () => {
            commit('SET_AUTHENTICATED', false)
            commit('SET_USER', null)
        });
}
}