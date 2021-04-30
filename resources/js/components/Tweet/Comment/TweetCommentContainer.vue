<template>
  <div class="space-y-3">
    <tweet-comment-input v-on:update-comments="updateComments" class="w-full"> </tweet-comment-input>
    <p class="font-semibold text-md text-white">Comments</p>
    <div class="space-y-2">
      <tweet-comment v-for="comment in comments" :key="comment.id" :comment="comment"> </tweet-comment>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data () {
    return {
      comments: []
    }
  },
  methods: {
    updateComments (value) {
      this.comments.unshift(value);
    }
  },
  created () {
    const tweetId = this.$route.params.id;
    const data = axios.get(`/api/tweet/${tweetId}/comments`)
      .then(response => this.comments = response.data)
  }
}
</script>

<style>

</style>