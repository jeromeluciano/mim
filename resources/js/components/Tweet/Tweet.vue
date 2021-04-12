<template>
  <!-- Media Container -->
  <div class="mb-4">
    <router-link class="cursor-pointer" to="`/tweet/${story.id}`">
      <img class="w-auto h-auto rounded-lg" v-bind:src="story.image" alt="" />
    </router-link>
    <div class="flex flex-row justify-between mt-2 w-auto">
      <!-- Author Avatar & Name -->
      <tweet-avatar :story="story"> </tweet-avatar>
      <!-- Tweet Information: Heart Emoji & Views counter -->
      <div class="flex flex-row">
        <tweet-reaction :story="story"> </tweet-reaction>
        <tweet-view-count :story="story"> </tweet-view-count>
      </div>
    </div>
  </div>
</template>

<script>
import TweetAvatar from './TweetAvatar'
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

<style></style>
