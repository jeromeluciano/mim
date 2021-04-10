<template>
  <div class="lg:relative hidden lg:flex lg:items-center mr-3">
    <label v-if="isSearchOnFocus == false && search.length == 0" for="searchDesktop" class="lg:absolute top-1/8 left-1 flex flex-row items-center">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 mr-2 text-gray-400"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
        />
      </svg>
      <p class="text-gray-500 text-sm">Search</p>
    </label>
    <input
      v-model="search"
      @change="syncSearchInput"
      @focus="toggleSearch"
      @blur="toggleSearch"
      id="searchDesktop"
      class="focus:outline-none focus:ring-2 text-white px-2 bg-secondary rounded-md py-1"
      type="text"
    />
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
  data () {
    return {
      search: ''
    }
  },
  computed: {
    ...mapGetters({
      isSearchIdle: 'navbar/isSearchIdle',
      isSearchOnFocus: 'navbar/isSearchOnFocus'
    })
  },
  methods: {
    ...mapActions({
      toggleSearch: 'navbar/toggleSearch',
      setSearch: 'navbar/setSearch'
    }),
    syncSearchInput () {
      this.setSearch(this.search);
    }
  }
};
</script>

<style>
</style>