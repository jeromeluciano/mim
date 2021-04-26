<template>
  <!-- Media Container -->
  <div class="mb-4">
    <router-link class="cursor-pointer" :to="{name: 'tweet', params: {id: story.id}}">
      <img v-if="isImage" class="w-full object-fit max-h-64 h-auto rounded-lg" v-bind:src="story.media_url" alt="" />
      <video class="rounded-md z-25" controls v-if="isVideo" v-bind:src="story.media_streamable_url"></video>
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
// import { videojs } from 'video-js'

export default {
  props: ['story'],
  components: {
    TweetAvatar,
    TweetReaction,
    TweetViewCount
  },
  computed: {
    isVideo () {
      return this.story.mime_type.startsWith('video')
    },
    isImage () {
      return this.story.mime_type.startsWith('image')
    }
  }
  
};
</script>

<style></style>
