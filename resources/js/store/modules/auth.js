export  default {
  namespaced: true,
  state: {
    authenticated: true,
    user: null,
    isLoginModalOpen: false,
    stories: [
      {
        id: 1,
        image: require('../../assets/images/zerotwo.png'),
        author: 'Denki Kaminari',
        author_avatar: require('../../assets/images/denki.jpg'),
        liked: true,
        likeCount: 102,
        views: 15000
      },
      {
        id: 2,
        image: require('../../assets/images/denki.jpg'),
        author: 'Denki Kaminari',
        author_avatar: require('../../assets/images/denki.jpg'),
        liked: true,
        likeCount: 300,
        views: 1023
      },
      {
        id: 3,
        image: require('../../assets/images/chizuru.jpg'),
        author: 'Denki Kaminari',
        author_avatar: require('../../assets/images/denki.jpg'),
        liked: true,
        likeCount: 205,
        views: 1600
      },
      {
        id: 4,
        image: require('../../assets/images/emilia.gif'),
        author: 'Denki Kaminari',
        author_avatar: require('../../assets/images/denki.jpg'),
        liked: false,
        likeCount: 251,
        views: 20000
      },
      {
        id: 5,
        image: require('../../assets/images/tanjiro.jpg'),
        author: 'Denki Kaminari',
        author_avatar: require('../../assets/images/denki.jpg'),
        liked: false,
        likeCount: 361,
        views: 25000
      },
      {
        id: 6,
        image: require('../../assets/images/mikasa.jpeg'),
        author: 'Denki Kaminari',
        author_avatar: require('../../assets/images/denki.jpg'),
        liked: true,
        likeCount: 151,
        views: 500
      },
      {
        id: 7,
        image: require('../../assets/images/mikasa.jpeg'),
        author: 'Denki Kaminari',
        author_avatar: require('../../assets/images/denki.jpg'),
        liked: true,
        likeCount: 20511,
        views: 5000
      },
    ]
  },
  getters: {
    stories: state => state.stories,
    authenticated: state => state.authenticated,
    isLoginModalOpen: state => state.isLoginModalOpen
  },
  mutations: {
    SET_STORIES (state, value) {
      state.stories = value
    },
    SET_AUTHENTICATED (state, value) {
      state.authenticated = value
    },
    SET_LOGIN_MODAL_STATE (state, value) {
      state.isLoginModalOpen = value
    }
  },
  actions: {
    toggleLoginModal ({ commit, state }) {
      if (!state.authenticated) 
        commit('SET_LOGIN_MODAL_STATE', !state.isLoginModalOpen)

    }
  }
}