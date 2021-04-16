import axios from 'axios'
import _ from 'lodash'

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
  async fetchTweets({ commit }) {
    let response = await axios.get('/api/tweets');
    console.log(response.data.tweets)
    commit('SET_STORIES', response.data.tweets)
  },
  async toggleLike({ commit, state }, target) {
    let copy = {
      ...target,
      liked: !target.liked,
      likesCount: target.liked ? --target.likesCount : ++target.likesCount
    }
    let index = _.findIndex(state.stories, target);
    
    state.stories.splice(index, 1, copy);
    

    // axios.post(`/api/${story.id}`)
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