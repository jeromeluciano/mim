<template>
  <div @click="gotoProfile" class="cursor-pointer hover:opacity-75 hover:bg-gray-500 hover:text-white w-auto py-2 rounded-md mx-2 flex items-center justify-start space-x-2 px-2 ">
    <img class="mr-2 h-8 w-8 rounded-full" :src="user.avatar_url" >
    <p class="text-gray-300 font-semibold text-xs">{{ user.name }}</p>
  </div>
</template>

<script>
export default {
  props: ['user'],
  methods: {
    gotoProfile () {
      console.log('Nav link clicked!')
      
      this.$router.push({name: 'profile', params: { id: this.user.id }})
      this.$router.go(this.$router.currentRoute)
    }
  }
}
</script>

<style>

</style>