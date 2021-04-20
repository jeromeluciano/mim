<template>
  <div class="flex flex-row items-center">
    <img
      class="rounded-full mr-2 w-6 h-6"
      v-bind:src="story.user.avatar_url"
      alt=""
    />
    <p class="text-gray-300 text-xs font-semibold">{{ story.user.name }}</p>
  </div>
</template>

<script>
export default {
  name: 'TweetAvatar',
  props: ['story']
};
</script>

<style>
</style>