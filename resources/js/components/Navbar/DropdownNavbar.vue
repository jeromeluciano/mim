<template>
<div>
      <div v-if="isBurgerOpen" class="lg:hidden md:hidden">
          <search-mobile> </search-mobile>
          <!-- Navigation Links -->
          <div @click="gotoHome"  class="cursor-pointer text-sm flex items-center bg-secondary mx-4 my-4 px-4 py-4 rounded-md text-gray-200 font-semibold" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
            <p>Home</p>
          </div>
          <div @click="gotoTrendings" class="cursor-pointer text-sm flex items-center bg-secondary mx-4 my-4 px-4 py-4 rounded-md text-gray-200 font-semibold" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
            </svg>
            <p>Trendings</p>
          </div>
          <div v-if="!authenticated" @click="toggleLoginModal" class="cursor-pointer text-sm flex items-center bg-secondary mx-4 my-4 px-4 py-4 rounded-md text-gray-200 font-semibold" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 mr-3 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            <p>Sign in</p>
          </div>
      </div>
      </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import SearchMobile from './SearchMobile.vue'

export default {
  components: { SearchMobile },
  name: 'DropdownHeader',
  computed: {
    ...mapGetters({
      isBurgerOpen: 'navbar/isBurgerOpen',
      isLoginModalOpen: 'auth/isLoginModalOpen',
      authenticated: 'auth/authenticated'
    })
  },
  methods: {
    ...mapActions({
      toggleBurger: 'navbar/toggleBurger',
      toggleLoginModal: 'auth/toggleLoginModal'
    }),
    gotoTrendings () {
      if(this.$router.name == 'trendings') return;
      this.$router.push({name: 'trendings'})
    },
    gotoHome () {
      if(this.$router.name == 'home') return;
      this.$router.push({name: 'home'})
    },
  }
}
</script>

<style>

</style>