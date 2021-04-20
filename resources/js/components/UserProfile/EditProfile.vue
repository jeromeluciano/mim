<template>
  <div class="flex flex-col justify-center">
    <div class="flex flex-row justify-center space-x-4 items-center">
      <div>
        <button @click="toggleUpload" class="focus:outline-none hover:text-opacity-70 bg-pink-600 text-white px-4 py-2 rounded-md font-semibold">Upload new avatar</button>
      </div>
      <div>
        <button class="bg-secondary text-white px-4 py-2 rounded-md font-semibold">Delete</button>
      </div>
    </div>

    <div v-if="isUploadOpen" class="mx-auto mt-4 text-white">
      <input @change="setAvatarInput" id="avatar" type="file">
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data () {
    return {
      isUploadOpen: false
    }
  },
  methods: {
    toggleUpload () {
      this.isUploadOpen = !this.isUploadOpen
    },
    setAvatarInput () {
      let avatar = document.querySelector('#avatar').files[0];
      let formData = new FormData();
      formData.append('avatar', avatar);

      axios.post('/api/user/avatar', formData)
    }
  }
}
</script>

<style>

</style>