<template>
  <div class="flex flex-row justify-between mt-2 w-auto">
    <!-- Author Avatar & Name -->
    <tweet-avatar :story="story"> </tweet-avatar>
    <!-- Tweet Information: Heart Emoji & Views counter -->
    <div class="flex flex-row">
      <tweet-reaction :story="story"> </tweet-reaction>
      <tweet-view-count :story="story"> </tweet-view-count>
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