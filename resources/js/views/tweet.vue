<template>
  <div>
    <tweet-view :story="story"> </tweet-view>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import TweetView from '../components/Tweet/TweetView.vue'
export default {
  name: 'tweet',
  components: {
    TweetView
  },
  data () {
    return {
      story: null
    }
  },
  computed: {
    ...mapGetters({
      getStory: 'auth/getStory'
    }) 
  },
  created () {
    const tweetId = this.$route.params.id
    console.log(this.$route.params.id)
    this.story = this.getStory(tweetId)
    console.log(this.getStory(tweetId))
  }
}
</script>

<style>

</style>