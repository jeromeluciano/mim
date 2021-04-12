import getters from './auth/getters'
import mutations from './auth/mutations'
import actions from './auth/actions'

export  default {
  namespaced: true,
  state: {
    authenticated: false,
    user: null,
    isLoginModalOpen: false,
    stories: [
      {
        id: 1,
        image: '/images/chizuro_animated.gif',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: true,
        likeCount: 300,
        views: 32500
      },
      {
        id: 2,
        image: '/images/zenitsu_animated.gif',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: true,
        likeCount: 180,
        views: 18952
      },
      {
        id: 3,
        image: '/images/chika_animated.gif',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: true,
        likeCount: 150,
        views: 15000
      },
      {
        id: 4,
        image: '/images/tanjiro_animated.gif',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: true,
        likeCount: 102,
        views: 15000
      },
      {
        id: 5,
        image: '/images/levi_animated.gif',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: true,
        likeCount: 102,
        views: 15000
      },
      {
        id: 6,
        image: '/images/emilia.gif',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: true,
        likeCount: 300,
        views: 1023
      },
      {
        id: 7,
        image: '/images/chizuru.jpg',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: true,
        likeCount: 205,
        views: 1600
      },
      {
        id: 8,
        image: '/images/denki.jpg',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: false,
        likeCount: 251,
        views: 20000
      },
      {
        id: 9,
        image: '/images/tanjiro.jpg',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: false,
        likeCount: 361,
        views: 25000
      },
      {
        id: 10,
        image: '/images/mikasa.jpeg',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: true,
        likeCount: 151,
        views: 500
      },
      {
        id: 11,
        image: '/images/mikasa.jpeg',
        author: 'Denki Kaminari',
        author_avatar: '/images/denki.jpg',
        liked: true,
        likeCount: 20511,
        views: 5000
      },
    ]
  },
  getters,
  mutations,
  actions
}