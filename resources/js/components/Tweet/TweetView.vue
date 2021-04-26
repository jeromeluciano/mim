<template>
  <div class="mx-auto w-full lg:w-7/12">
  <tweet-footer :story="story"> </tweet-footer>
    <div class="rounded-lg">
      <img v-if="isImage" class="mt-2 w-full object-fit max-h-96 rounded-lg" :src="story.media_url" alt="">
      <video v-if="isVideo" class="mt-2 w-full object-fit max-h-96 rounded-lg" controls :src="story.media_streamable_url"></video>
    </div>
    <tweet-comment-container> </tweet-comment-container>
  </div>
</template>

<script>
import TweetFooter from './TweetFooter.vue'
import { mapGetters } from 'vuex'
import axios from 'axios'

export default {
  components: { TweetFooter },
  props: ['story'],
  computed: {
    isImage () {
      return this.story.mime_type.startsWith('image')
    },
    isVideo () {
      return this.story.mime_type.startsWith('video')
    }
  },
  async created () {
    // if (this.story == null) {
    //   const data = axios.get(`/api/tweet/${this.$route.params.id}`).then(response => response.data)
    //   console.log('Test:',data)
    //   // this.story = data
    //   // console.log('This: ', response)
    // }
    
    axios.patch(`/api/tweet/${this.$route.params.id}/views`)
  }
}
</script>

<style>

</style>