<template>
  <form id="upload-form" class="lg:w-5/12 mx-auto space-y-2">
    <div
      @click="openFile"
      class="hover:border-pink-600 overflow-hidden hover:opacity-90 cursor-pointer border-dashed border-2 w-full h-80 rounded-lg mx-auto flex items-center justify-center shadow-lg"
    >
      <input
        id="attachment"
        @change="previewImage"
        ref="attachment"
        class="hidden"
        type="file"
      />
      <!-- <svg
        v-if="media == ''"
        xmlns="http://www.w3.org/2000/svg"
        class="text-gray-300 h-32 w-32"
        viewBox="0 0 20 20"
        fill="currentColor"
      >
        <path
          fill-rule="evenodd"
          d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
          clip-rule="evenodd"
        />
      </svg> -->
      <!-- <video v-if="attachment" class="video-js rounded-md w-full h-full" controls v-bind:src="attachment"></video> -->
      <img class="w-auto h-auto" v-bind:src="attachment" alt="" />
    </div>

    <div class="flex justify-center items-center relative mt-2">
      <button
        class="absolute left-0 top-1 focus:ring-2 focus:outline-none hover:opacity-90 bg-pink-600 text-white px-4 py-2 rounded-md"
      >
        Create
      </button>
    </div>
  </form>
</template>

<script>
import axios from 'axios'
export default {
  name: "UploadForm",
  data() {
    return {
      attachment: null,
      mimeType: '',
    };
  },
  methods: {
    openFile() {
      this.$refs["attachment"].click();
    },

    previewImage(e) {
      let media = document.querySelector("#attachment").files[0];
      console.log(media.type, media.name)
      let reader = new FileReader();
      
      reader.onload = (e) => {
      
        this.mimeType = media.type

        // if (this.mimeType.startsWith('video')) {
        //   let blobURL = URL.createObjectURL(media)
        //   console.log(blobURL)
        //   this.attachment = blobURL
        // } 
        
        // else if (this.mimeType.startsWith('image')) {
          reader.readAsDataURL(media);
          this.attachment = e.target.result
        // }
      };
      // let formData = new FormData();
      // formData.set('attachment', media);

      // axios.post('/api/tweet', formData, {
      //   headers: {
      //     'content-type': 'multipart/form-data'
      //   }
      // })

    },
  },
};
</script>

<style>
</style>