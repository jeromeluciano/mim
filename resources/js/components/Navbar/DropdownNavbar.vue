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
    })
  },
  methods: {
    ...mapActions({
      toggleBurger: 'navbar/toggleBurger',
    }),
    gotoTrendings () {
      if(this.$router.name == 'trendings') return;
      this.$router.push({name: 'trendings'})
    },
    gotoHome () {
      if(this.$router.name == 'home') return;
      this.$router.push({name: 'home'})
    }
  }
}
</script>

<style>

</style>