<template>
  <div class="flex flex-row items-center">
    <svg
      class="text-gray-500 h-4 w-4 mr-1"
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 20 20"
      fill="currentColor"
    >
      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
      <path
        fill-rule="evenodd"
        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
        clip-rule="evenodd"
      />
    </svg>
    <span class="text-gray-400 text-xs">{{ storyViews }}</span>
  </div>
</template>

<script>
const abbreviate = require('number-abbreviate')

export default {
  name: 'TweetViewCount',
  props: ['story'],
  computed: {
    storyViews () {
      return abbreviate(this.story.views, 2)
    }
  }
};
</script>

<style>
</style>