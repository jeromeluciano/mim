<template>
  <div class="flex flex-row justify-between mt-2 w-auto">
    <!-- Author Avatar & Name -->
    <tweet-avatar :story="story"> </tweet-avatar>
    <!-- Tweet Information: Heart Emoji & Views counter -->
    <div class="relative flex flex-row items-center">
      <tweet-reaction :story="story"> </tweet-reaction>
      <tweet-view-count :story="story"> </tweet-view-count>
      <tweet-menu-button :story="story"> </tweet-menu-button>
    </div>
  </div>
</template>

<script>
export default {
  name: "TweetFooter",
  props: ['story']
};
</script>

<style>
</style>