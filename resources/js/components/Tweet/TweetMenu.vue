<template>
  <div>
    <!-- modal -->
  <div>
    <div v-if="isOpen" class="fixed top-0 left-0 flex items-center justify-center w-auto h-auto md:w-screen md:h-screen overflow-auto shadow-lg text-sm">
      <div  @mousedown="isOpen = false" class="absolute top-0 left-0 bg-pink-500 h-screen w-screen opacity-50 bg-semi-transparent"></div>
      <!-- modal content -->
      <div class="space-y-2 p-4 z-50 bg-white max-w-md max-h-md w-auto h-auto rounded-b-lg lg:rounded-md relative overflow-auto">
        <p class="font-semibold text-md">Are you sure you want to delete this tweet?</p>
        <button class="text-white bg-red-500 px-4 py-1 rounded">Yes</button>
        <button @click="isOpen = false" class="text-white bg-secondary px-4 py-1 rounded">No</button>
      </div>

    </div>
      <button @click="isOpen = true" class="focus:outline-none text-gray-500 ">
        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
        </svg>
      </button>
  </div>
    
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>