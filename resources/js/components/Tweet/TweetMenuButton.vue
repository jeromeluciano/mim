<template>
  <!-- modal -->
  <!-- <div> -->
    <!-- <div v-if="isOpen" class="fixed top-0 left-0 flex items-center justify-center w-auto h-auto md:w-screen md:h-screen overflow-auto shadow-lg text-sm">
      <div  @mousedown="isOpen = false" class="absolute top-0 left-0 bg-pink-500 h-screen w-screen opacity-50 bg-semi-transparent"></div>
      <!-- modal content -->
      <!-- <div class="space-y-2 p-4 z-50 bg-white max-w-md max-h-md w-auto h-auto rounded-b-lg lg:rounded-md relative overflow-auto">
        <p class="font-semibold text-md">Are you sure you want to delete this tweet?</p>
        <button class="text-white bg-red-500 px-4 py-1 rounded">Yes</button>
        <button @click="isOpen = false" class="text-white bg-secondary px-4 py-1 rounded">No</button>
      </div> -->

    <!-- </div> -->
    <div>
      <!-- modal -->
      <div v-if="deleteWindowState" class="fixed top-0 left-0 flex items-center justify-center w-auto h-auto md:w-screen md:h-screen overflow-auto shadow-lg text-sm">
        <div  @mousedown="isOpen = false, deleteWindowState = false" class="absolute top-0 left-0 bg-pink-500 h-screen w-screen opacity-50 bg-semi-transparent"></div>
        <!-- modal content -->
        <div class="space-y-2 p-4 z-100 bg-white max-w-md max-h-md w-auto h-auto rounded-b-lg lg:rounded-md relative overflow-auto">
          <p class="font-semibold text-md">Are you sure you want to delete this tweet?</p>
          <button @click="deleteTweet" class="text-white bg-red-500 px-4 py-1 rounded">Yes</button>
          <button @click="deleteWindowState = false" class="text-white bg-secondary px-4 py-1 rounded">No</button>
        </div>
      </div>
      <!--  -->
      <div v-if="isOpen" class="absolute right-1 bottom-10 w-24">
        <div class="flex flex-col bg-white py-2 space-y-2">
          <button v-if="tweetDeletePermission" @click="deleteWindowState = true, isOpen = false" class="flex flex-row items-center justify-center text-secondary text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
            Delete
          </button>
          <button class="flex flex-row items-center justify-center text-secondary text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            Report
          </button>
        </div>
      </div>
      <button @click="isOpen = !isOpen" class="focus:outline-none text-gray-500 ">
        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
        </svg>
      </button>
    </div>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex'
import TweetMenu from './TweetMenu.vue'
import axios from 'axios'
export default {
  props: ['story'],
  data () {
    return {
      isOpen: false,
      deleteWindowState: false
    }
  },
  computed: {
    ...mapGetters({
      user: 'auth/user',
      authenticated: 'auth/authenticated'
    }),
    tweetDeletePermission () {
      return this.authenticated && this.story.user.id == this.user.id
    }
  },
  methods: {
    ...mapMutations({
      deleteTweetFromState: 'auth/DELETE_TWEET'
    }),
    deleteTweet () {
      this.deleteWindowState = false
      if (this.authenticated) {
        axios.delete(`/api/tweet/${this.story.id}`)
          .then( response => {
            console.log('Response:', response.data)
            this.deleteTweetFromState(this.story)
            this.$toastr.s('Tweet deleted')
          })
      }
    }
  }
}
</script>

<style>

</style>