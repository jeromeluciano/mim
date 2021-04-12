<template>
  <div class="mx-auto w-full lg:w-7/12">
    <div>
      <img class="w-full  rounded-lg" :src="story.image" alt="">
    </div>
    <tweet-footer :story="story"> </tweet-footer>
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