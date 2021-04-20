<template>
  <div>
      <h1 class="text-white text-2xl font-semibold mb-2">Stories</h1>
      <TweetContainer :stories="stories"/>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import TweetContainer from './TweetContainer.vue'
export default {
  components: { TweetContainer },
  computed: {
    ...mapGetters({
      stories: 'auth/stories'
    })
  },
  methods: {
    ...mapActions({
      fetchTweets: 'auth/fetchTweets'
    })
  },
  async created () {
    await this.fetchTweets()
  }
}
</script>

<style>

</style>