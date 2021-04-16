<template>
  <div class="mx-auto w-full lg:w-7/12">
  <tweet-footer :story="story"> </tweet-footer>
    <div class="rounded-lg">
      <img class="mt-2 w-full object-fit max-h-96 rounded-lg" :src="story.media_url" alt="">
    </div>
    
  </div>
</template>

<script>
import TweetFooter from './TweetFooter.vue'
export default {
  components: { TweetFooter },
  props: ['story']
}
</script>

<style>

</style>