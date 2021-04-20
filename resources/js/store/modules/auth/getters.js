export default {
  stories: state => state.stories,
  authenticated: state => state.authenticated,
  isLoginModalOpen: state => state.isLoginModalOpen,
  getStory: state => id => state.stories.find(tweet => tweet.id == id)
  ,
  user: state => state.user,
  trendings: state => state.trendings,
  userTweets: state => {}
}