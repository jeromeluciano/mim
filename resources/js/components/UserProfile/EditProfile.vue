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
      <input id="avatar" type="file">
      <button @click="setAvatarInput" class="bg-pink-600 text-white px-2 py-2 rounded-md">Upload avatar</button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { mapActions } from 'vuex'
export default {
  data () {
    return {
      isUploadOpen: false
    }
  },
  methods: {
    ...mapActions({
      me: 'auth/me'
    }),
    async refetchUser() {
      await this.me()
    },
    toggleUpload () {
      this.isUploadOpen = !this.isUploadOpen
      console.log('toggled')
    },
    setAvatarInput () {
      let avatar = document.querySelector('#avatar').files[0];
      let formData = new FormData();
      formData.append('avatar', avatar);

      axios.post('/api/user/avatar', formData)
        .then(response => {
          this.$toastr.s('Avatar upload', 'Avatar upload successful')
          this.refetchUser()
        });
    }
  }
}
</script>

<style>

</style>