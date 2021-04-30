<template>
  <div class="bg-secondary p-3 rounded-md space-y-2">
    <div class="flex flex-row justify-between items-center">
      <div class="flex flex-row space-x-2 items-center ">
        <img class="rounded-full w-7 h-7" :src="comment.user.avatar_url">
        <p class="font-semibold text-xs text-gray-300">{{ comment.user.name }}</p>
      </div>
      <div class="text-xs font-semibold text-gray-500">
        <p> {{ comment.commentedAt }} </p>
      </div>
    </div>
    <div class="text-gray-300 text-sm ">{{ comment.message }}</div>
  </div>
</template>

<script>
export default {
  props: ['comment']
}
</script>

<style>

</style>