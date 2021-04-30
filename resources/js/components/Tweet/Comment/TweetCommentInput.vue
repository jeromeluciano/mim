<template>
  <div class="mt-3 flex flex-row space-x-2">
    <img :src="user.avatar_url" class="w-10 h-10 rounded-full" alt="">
    <textarea @keypress.enter.exact="submitComment" placeholder="Write a comment..." class="bg-gray-200 rounded-full py-2 px-4 focus:outline-none w-full h-10" v-model="message"></textarea>
    <button @click="submitComment" class="focus:outline-none block ">
      <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-500 rotate-180 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
      </svg>
    </button>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import axios from 'axios'
export default {
  props: ['story'],
  data() {
    return {
      message: '',
    }
  },
  computed: {
    ...mapGetters({
      user: 'auth/user'
    })
  },
  methods: {
    submitComment () {
      if (this.message.length > 0 && this.message.length <= 255) {
        const tweetId = this.$route.params.id
        const formData = new FormData()
        formData.append('message', this.message)
        formData.append('tweet_id', tweetId)

        axios.post(`/api/tweet/${tweetId}/comment`, formData)
          .then(response => {
            const data = response.data;
            this.$emit('update-comments', data);
            this.message = ''
          });
      } else {
        this.$toastr.e('Invalid data','Comment must be more than 1 char but not exceed to 255 chars')
      }
      console.log('Comment submitted.')
    }
  }
}
</script>

<style>

</style>