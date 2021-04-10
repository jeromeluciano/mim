<template>
  <!-- modal -->
    <div v-if="isLoginModalOpen" class="fixed top-0 left-0 flex items-center justify-center w-auto h-auto md:w-screen md:h-screen overflow-auto shadow-lg text-sm">
      <div @mousedown="toggleModal" class="absolute top-0 left-0 bg-gray-500 h-screen w-screen bg-semi-transparent"></div>
      <!-- modal content -->
      <div class="z-50 bg-white max-w-md max-h-md w-auto h-auto rounded-b-lg lg:rounded-lg relative overflow-auto">
        <!-- close btn -->
        <svg @click="toggleModal" class="text-gray-100 cursor-pointer m-2 absolute top-0 right-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
        <div class="">
          <img class=" bg-pink-600 h-auto w-auto rounded-none md:rounded-t-lg lg:rounded-t-lg" src="../../assets/images/socialmediabg.jpg" alt="">
        </div>
        
        <div class="p-4 space-y-3">
          <p class="text-xs text-gray-500 text-center">
            Made with love <span class="text-pink-600 animate-pulse">❤</span>
          </p>
          <!-- form -->
          <input class="w-full border border-gray-300 p-2 rounded" type="text" placeholder="Email address">
          <input class="w-full border border-gray-300 p-2 rounded" type="password" placeholder="Password">
          <a class="block text-gray-500 text-xs mt-4 text-right" href="">Forgot password?</a>
          <button class="focus:outline-none w-full bg-pink-600 text-white py-2 rounded">Sign in</button>
          <a class="block text-center text-gray-500 mt-4" href="">Create account</a>
        </div>
      </div>

    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  name: 'LoginPopup',
  computed: {
    ...mapGetters({
      isLoginModalOpen: 'auth/isLoginModalOpen'
    })
  },
  methods: {
    ...mapActions({
      toggleLoginModal: 'auth/toggleLoginModal'
    }),
    toggleModal () {
      this.toggleLoginModal();
    }
  }
}
</script>

<style>

</style>