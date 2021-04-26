<template>
  <div v-if="authenticated" class="lg:relative items-center">
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
          @keyup="searchUser"
          @focus="focusAndToggleSearch"
          @blur="toggleSearch"
          id="searchDesktop"
          class="focus:outline-none focus:ring-2 text-white px-2 bg-secondary rounded-md py-1"
          type="text"
        />
  </div>
  <div class="hidden lg:block lg:relative mt-2">
    <div @blur="hideSearchResult" v-if="searchResult.length > 0 && searchResultState" class="z-50 lg:absolute bg-secondary w-full pb-4 rounded-lg right-2" >
      <p class="text-gray-300 text-sm font-semibold mx-3 my-2">Search result:</p>
      <user-link @click="test" v-for="user in searchResult" :user="user" :key="user.id"> </user-link>
    </div>
  </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import axios from 'axios'
import UserLink from './UserLink.vue';
export default {
  components: { UserLink },
  data () {
    return {
      search: '',
      searchResult: [],
      searchResultState: false
    }
  },
  computed: {
    ...mapGetters({
      isSearchIdle: 'navbar/isSearchIdle',
      isSearchOnFocus: 'navbar/isSearchOnFocus',
      authenticated: 'auth/authenticated'
    })
  },
  methods: {
    ...mapActions({
      toggleSearch: 'navbar/toggleSearch',
      setSearch: 'navbar/setSearch'
    }),
    focusAndToggleSearch () {
      this.toggleSearch()
      this.searchResultState = true
    },
    hideSearchResult () {
      this.searchResultState = false
    },
    syncSearchInput () {
      this.setSearch(this.search);
    },
    searchUser () {
      // query the database to search for user
      const search = document.querySelector('#searchDesktop')
      const formData = new FormData()
      formData.append('search', this.search)
      axios.post('/api/user/search', formData)
        .then(response => {
          const data = response.data
          this.searchResult = response.data
          console.log(data)
        })
    }, 
    test () {
      console.log('test clicked');
    }
  }
};
</script>

<style>
</style>