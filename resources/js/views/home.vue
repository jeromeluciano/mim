<template> 
  <div>
    <story> </story>
  </div>
</template>

<script>
import Story from '../components/Tweet/Story.vue'
import axios from 'axios'
import { mapGetters, mapActions } from 'vuex'
export default {
  name: 'home',
  components: {
    Story
  },
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
    this.fetchTweets();
  },
}
</script>
