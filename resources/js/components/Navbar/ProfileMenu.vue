<template>
  <!-- Profile Menu Modal -->
  <div class="hidden lg:block relative">
    <!-- Avatar -->
    <div v-if="authenticated" class="focus:outline-none hidden lg:block mr-2">
      <button @click="toggleProfileMenu" class="focus:outline-none focus:ring-2 rounded-full">
        <img
          class="cursor-pointer h-8 w-8 rounded-full"
          v-bind:src="user.avatar_url"
          alt=""
        />
      </button>
    </div>

    <!-- Profile Menu Modal -->
    <div v-if="isProfileMenuOpen" @blur="closeProfileMenuModal" @mouseleave="toggleProfileMenu" class="hidden lg:block space-y-3 space-x-2 absolute rounded-md px-2 py-4 bg-white w-40 h-auto right-1/4">
      <button class="focus:outline-none flex flex-row justify-center items-center text-sm text-gray-500 w-full">
        <div class="m-0 p-0">
          <img class="cursor-pointer h-6 w-6 rounded-full mr-4" :src="user.avatar_url" alt=""/>
        </div>
        <p @click="gotoProfile">Denki Kaminari</p>
      </button>
      <!-- <button
        class="focus:outline-none flex flex-row items-center text-sm text-gray-500 w-full"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6 mr-4"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
            clip-rule="evenodd"
          />
        </svg>
        <p>Settings</p>
      </button> -->
      <button
        @click="logout"
        class="focus:outline-none flex flex-row mr-4 items-center text-sm text-gray-500 w-full"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6 mr-4"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
            clip-rule="evenodd"
          />
        </svg>
        <p>Sign out</p>
      </button>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  name: "ProfileMenu",
  data() {
    return {
      isProfileMenuOpen: false,
    };
  },
  computed: {
    ...mapGetters({
      authenticated: 'auth/authenticated',
      user: 'auth/user'
    })
  },
  methods: {
    ...mapActions({
      signOut: 'auth/signOut'
    }),
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen;
    },
    closeProfileMenuModal () {
      this.isProfileMenuOpen = false
    },
    async logout () {
      await this.signOut()
    },
    gotoProfile () {
      this.$router.push({ name: 'profile', params: {id: this.user.id}})
    }
  },
};
</script>

<style></style>
