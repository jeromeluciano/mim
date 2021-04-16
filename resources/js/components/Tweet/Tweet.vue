<template>
  <!-- Media Container -->
  <div class="mb-4">
    <router-link class="cursor-pointer" :to="{name: 'tweet', params: {id: story.id}}">
      <img class="w-full object-fit max-h-64 h-auto rounded-lg" v-bind:src="story.media_url" alt="" />
      
    </router-link>
    <tweet-footer :story="story"> </tweet-footer>
    
  </div>
</template>

<script>
import TweetAvatar from './TweetAvatar'
import TweetFooter from './TweetFooter.vue';
import TweetReaction from './TweetReaction';
import TweetViewCount from './TweetViewCount';
import axios from 'axios'

export default {
  props: ['story'],
  components: {
    TweetAvatar,
    TweetReaction,
    TweetViewCount
  },
  
};
</script>

<style></style>
