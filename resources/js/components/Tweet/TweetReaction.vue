<template>
  <!-- Heart Emoji -->
  <div class="flex flex-row items-center mr-3">
    <button
      @click="toggleLike(story)"
      class="focus:outline-none"
      :class="{ 'animate-pulse': story.liked }"
    >
      <svg
        :class="{ 'text-pink-500': story.liked }"
        class="focus:outline-none text-gray-500 h-4 w-4 mr-1"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="currentColor"
      >
        <path
          fill-rule="evenodd"
          d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
          clip-rule="evenodd"
        />
      </svg>
    </button>
    <span class="text-gray-400 text-xs"> {{ likesCount }} </span>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
const abbr = require('number-abbreviate')
export default {
  name: 'TweetReaction',
  props: ['story'],
  computed: {
    likesCount: function () {
      return abbr(this.story.likesCount, 2)
    }
  },
  methods: {
    ...mapActions({
      toggleLike: 'auth/toggleLike'
    })
  }
};
</script>

<style>
</style>