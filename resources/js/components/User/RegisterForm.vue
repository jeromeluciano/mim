<template>
  <form class="w-full space-y-2 p-4 lg:w-2/4 h-auto mx-auto space-y-4">
    <div class="grid grid-cols-2 gap-4">
      <div class="flex flex-col space-y-1">
        <label class="font-semibold text-white">Name</label>
        <input class="bg-secondary h-10 rounded w-auto px-2 text-white" type="text">
      </div>
      <div class="flex flex-col space-y-1">
        <label class="font-semibold text-white">Username</label>
        <input class="bg-secondary h-10 rounded w-auto px-2 text-white" type="text">
      </div>
    </div>

    <div class="flex flex-col space-y-1 mb-2">
      <label class="font-semibold text-white">Email</label>
      <input class="bg-secondary h-10 rounded w-auto px-2 text-white" type="email">
    </div>
    <div class="flex flex-col space-y-1">
      <label class="font-semibold text-white">Password</label>
      <input class="bg-secondary h-10 rounded w-auto px-2 text-white" type="password">
    </div>
    
    <button class="bg-pink-600 text-white text-md font-semibold p-2 rounded">
      Create Account
    </button>
  </form>
</template>

<script>
export default {

}
</script>

<style>

</style>