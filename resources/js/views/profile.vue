<template>
  <div :key="this.$route.path">
      <div class="flex flex-row justify-center itemsc-center py-4 space-x-8">
        <div>
          <img  class="rounded-full w-32 h-32 object-fit" v-bind:src="userProfile.avatar_url == null ? 'https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg' : userProfile.avatar_url">
        </div>
        <div class="flex flex-col mt-2">
          <h1 class="text-2xl lg:text-3xl font-bold text-white">{{ userProfile.name }}</h1>
          <button v-if="authenticatedUserIsMe()"  @click="toggleEditProfile " class="border borger-gray-600 text-white rounded-md py-2 lg:mt-4 mt-2">Edit Profile</button>
        </div>
      </div>
      
      <div class="mt-8">
        <edit-profile v-if="isEditProfileOpen" class="mb-4" />
        <tweet-container :stories="stories"/>
      </div>
  </div>
</template>

<script>
import axios from 'axios'
import { mapActions, mapGetters } from 'vuex'
import EditProfile from '../components/UserProfile/EditProfile.vue'
export default {
  name: 'profile',
  data () {
    return {
      isEditProfileOpen: false,
      userProfile: null
    }
  },
  computed: {
    ...mapGetters({
      stories: 'auth/stories',
      authenticated: 'auth/authenticated',
      user: 'auth/user',
    }),
  },
  methods: {
    ...mapActions({
      fetchUserTweets: 'auth/fetchUserTweets'
    }),
    toggleEditProfile () {
      this.isEditProfileOpen = !this.isEditProfileOpen
    },
    authenticatedUserIsMe () {
      console.log(this.user)
      console.log(this.$route.params.id, this.user.id)
      return this.authenticated && this.user.id == this.$route.params.id
    }
  },
  async created () {
    const userId = this.$route.params.id
    
    let response = await axios.get(`/api/user/${userId}`)
    this.userProfile = response.data
    console.log('user: '+this.userProfile)
    this.fetchUserTweets(userId)
  },
}
</script>

<style>

</style>