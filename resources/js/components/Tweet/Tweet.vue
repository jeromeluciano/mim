<template>
  <!-- Media Container -->
  <div class="mb-4">
    <router-link class="cursor-pointer" :to="{name: 'tweet', params: {id: story.id}}">
      <img class="w-auto h-auto rounded-lg" v-bind:src="story.image" alt="" />
    </router-link>
    <tweet-footer :story="story"> </tweet-footer>
  </div>
</template>

<script>
import TweetAvatar from './TweetAvatar'
import TweetFooter from './TweetFooter.vue';
import TweetReaction from './TweetReaction';
import TweetViewCount from './TweetViewCount';
export default {
  props: ['story'],
  components: {
    TweetAvatar,
    TweetReaction,
    TweetViewCount
  }
};
</script>
    TweetFooter

<style></style>
