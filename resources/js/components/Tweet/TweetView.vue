<template>
  <div>
    <div v-if="story">
      <div class="mx-auto w-full lg:w-7/12">
      <tweet-footer :story="story"> </tweet-footer>
        <div class="rounded-lg">
          <img v-if="isImage" class="mt-2 w-full object-fit max-h-96 rounded-lg" :src="story.media_url" alt="">
          <video v-if="isVideo" class="mt-2 w-full object-fit max-h-96 rounded-lg" controls :src="story.media_streamable_url"></video>
        </div>
        <tweet-comment-container> </tweet-comment-container>
      </div>
    </div>
    <div v-else>
      <div class="mx-auto w-full lg:w-7/12">
      <tweet-footer :story="pullStory"> </tweet-footer>
        <div class="rounded-lg">
          <img v-if="isImage" class="mt-2 w-full object-fit max-h-96 rounded-lg" :src="pullStory.media_url" alt="">
          <video v-if="isVideo" class="mt-2 w-full object-fit max-h-96 rounded-lg" controls :src="pullStory.media_streamable_url"></video>
        </div>
        <tweet-comment-container> </tweet-comment-container>
      </div>
    </div>
  </div>
</template>

<script>
import TweetFooter from './TweetFooter.vue'
import { mapGetters } from 'vuex'
import axios from 'axios'

export default {
  components: { TweetFooter },
  props: ['story'],
  data () {
    return {
      pullStory: null
    }
  },
  computed: {
    isImage () {
      if (this.story) return this.story.mime_type.startsWith('image')
      else return this.pullStory.mime_type.startsWith('image')
    },
    isVideo () {
      if (this.story) return this.story.mime_type.startsWith('video')
      else return this.pullStory.mime_type.startsWith('video')
    },
  },
  async created () {
    if (this.story == undefined) {
      const story = await axios.get(`/api/tweet/${this.$route.params.id}`).then(response => response.data)
      this.pullStory = story;
      console.log('This: ', story)
    }
    
    axios.patch(`/api/tweet/${this.$route.params.id}/views`)
  }
}
</script>

<style>

</style>