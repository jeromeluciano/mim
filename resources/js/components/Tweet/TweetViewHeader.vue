<template>
  <div class="flex flex-row justify-between mt-2 w-auto">
    <!-- Author Avatar & Name -->
    <tweet-avatar :story="story"> </tweet-avatar>
    <!-- Tweet Information: Heart Emoji & Views counter -->
    <div class="relative flex flex-row items-center">
      
       <div class="flex flex-row items-center mr-4">
        <button
          @click="toggleLike"
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
        <span class="text-gray-400 text-xs"> {{ story.likesCount }} </span>
      </div>

      <tweet-view-count :story="story"> </tweet-view-count>
     
      <tweet-menu-button :story="story"> </tweet-menu-button>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: "TweetViewHeader",
  props: ['story'],
  methods: {
    toggleLike () {
      let copy = {
        ...this.story,
        liked: !this.story.liked,
        likesCount: this.story.liked ? --this.story.likesCount : ++this.story.likesCount
      }
      console.log('heart clicked')
      this.story = copy
      axios.post(`/api/tweets/${this.story.id}/like`)
    }
  }
};
</script>

<style>
</style>