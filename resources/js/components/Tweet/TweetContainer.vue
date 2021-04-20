<template>
  <div class="lg:grid lg:grid-cols-3 lg:gap-4">
    <Tweet v-for="story in stories" v-bind:story="story" :key="story.id"/>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Tweet from './Tweet'

export default {
  name: 'TweetContainer',
  components: {
    Tweet
  },
  props: ['stories']
}
</script>