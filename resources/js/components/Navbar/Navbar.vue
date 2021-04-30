<template>
    <nav class="flex flex-row items-center justify-between bg-primary shadow-sm h-10 lg:h-14">
        <!-- Icon -->
        <div class="lg:hidden ml-4">
          <svg @click="toggleBurger" v-if="isBurgerOpen === false" class="h-6 w-6 cursor-pointer text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg @click="toggleBurger" v-else class="h-6 w-6 cursor-pointer text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>

        <div class="lg:mx-4 text-gray-500">
          <h3 class="hidden lg:block">mim</h3>
          <navigation-button class="lg:hidden"> </navigation-button>
        </div>

        <div class="mr-4 lg:flex lg:items-center">
          <!-- Desktop  -->
          <div class="lg:flex lg:flex-row">
            <navigation-button class="hidden"> </navigation-button>

            <search-desktop> </search-desktop>

            <profile-menu> </profile-menu>

            <login-or-upload-button> </login-or-upload-button>
          </div>
          <!-- Mobile - Write button  -->
        <!-- <button class="focus:outline-none bg-pink-500 text-white font-semibold lg:hidden" href="#">
          Upload
        </button> -->
      </div>
    </nav>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import ProfileMenu from './ProfileMenu.vue'
import SearchDesktop from './SearchDesktop.vue'
import LoginOrUploadButton from './LoginOrUploadButton'
import NavigationButton from './NavigationButton'

export default {
  components: {
    SearchDesktop,
    ProfileMenu,
    LoginOrUploadButton ,
    NavigationButton
  },
  name: 'Header',
  data () {
    return { 
      search: ''
    }
  },
  computed: {
    ...mapGetters({
      // isSearchIdle: 'navbar/isSearchIdle',
      isBurgerOpen: 'navbar/isBurgerOpen',
      // isSearchOnFocus: 'navbar/isSearchOnFocus'
    })
  },
  methods: {
    ...mapActions({
      toggleBurger: 'navbar/toggleBurger',
      toggleModal: 'auth/toggleLoginModal'
    })
  }
}
</script>

<style>

</style>