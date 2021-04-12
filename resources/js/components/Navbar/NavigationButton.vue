<template>
  <div class="lg:flex lg:items-center mr-3 space-x-3">
    <!-- home -->
    <button class="focus:outline-none" @click="gotoHome">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="text-gray-500 h-5 w-5"
        viewBox="0 0 20 20"
        fill="currentColor"
      >
        <path
          d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
        />
      </svg>
    </button>
    <!-- trending -->
    <button class="focus:outline-none" @click="gotoTrending">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="focus:outline-none text-gray-500 h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
        />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  name: 'NavigationButton',
  methods: {
    gotoTrending () {
      if (this.$route.name == 'trendings') return;
      this.$router.push({name: 'trendings'})
    },
    gotoHome () {
      if (this.$route.name == 'home') return;
      this.$router.push({name: 'home'})
    }
  }

};
</script>

<style>
</style>