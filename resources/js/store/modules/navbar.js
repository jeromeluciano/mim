export  default {
  namespaced: true,
  state: {
    burgerState: false,
    search: '',
    searchInputState: false
  },
  getters: {
    searchState: state => state.search,
    isSearchIdle: state => (state.searchInputState == false),
    isBurgerOpen: state => state.burgerState,
    isSearchOnFocus: state => state.searchInputState
  },
  mutations: {
    SET_BURGER_STATE (state, value) {
      state.burgerState = value
    },
    SET_SEARCH (state, value) {
      state.search = value
    },
    SET_SEARCH_STATE (state, value) {
      state.searchInputState = value
    }
  },
  actions: {
    toggleBurger ({ commit, state }) {
      commit('SET_BURGER_STATE', !state.burgerState)
    },
    setSearch ({ commit }, payload) {
      commit('SET_SEARCH', payload)
    },
    toggleSearch ({ commit, state }) {
      commit('SET_SEARCH_STATE', !state.searchInputState)
    },
  }
}