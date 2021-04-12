export default {
  SET_STORIES (state, value) {
    state.stories = value
  },
  SET_USER (state, value) {
    state.user = value;
  },
  SET_AUTHENTICATED (state, value) {
    state.authenticated = value
  },
  SET_LOGIN_MODAL_STATE (state, value) {
    state.isLoginModalOpen = value
  }
}