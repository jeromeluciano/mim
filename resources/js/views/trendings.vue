<template>
  <div>
    <h1 class="text-white text-2xl font-semibold mb-2">Trendings 🔥</h1>
    <tweet-container :stories="trendings"> </tweet-container>
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
export default {
  name: 'trendings',
  computed: {
    ...mapGetters({
      trendings: 'auth/trendings'
    })
  },
  methods: {
    ...mapActions({
      fetchTrendings: 'auth/fetchTrendings'
    })
  },
  async created () {
    await this.fetchTrendings();
  }
}
</script>

<style>

</style>