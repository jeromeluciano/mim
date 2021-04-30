<template>
  <div>
    <button 
      v-if="authenticated" 
      @click="gotoCreate"
      class="focus:outline-none focus:ring-2 ring-white lg:block text-sm font-semibold bg-pink-500 text-white rounded-md px-4 py-1"
    >
      Upload
    </button>
    <button
      v-else
      @click="toggleLoginModal"
      class="hover:opacity-50 focus:outline-none focus:ring-2 ring-white lg:flex lg:flex-row lg:py-2 text-sm font-semibold bg-pink-500 text-white rounded-md px-4"
    >
    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
    </svg>
    <p>Sign in</p>
    
    </button>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  name: 'LoginOrUploadButton',
  computed: {
    ...mapGetters({
      authenticated: 'auth/authenticated',
      isLoginModalOpen: 'auth/isLoginModalOpen'
    })
  },
  methods: {
    ...mapActions({
      toggleLoginModal: 'auth/toggleLoginModal'
    }),
    openLoginModal () {
      this.toggleLoginModal()
    },
    gotoCreate () {
      if (this.$route.name == 'create') return;
        this.$router.push({name: 'create'})
    }
  }
};
</script>

<style>
</style>