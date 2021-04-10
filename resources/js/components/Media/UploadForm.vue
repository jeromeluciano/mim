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
      <svg
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
      </svg>
      <img class="w-auto h-auto" v-else v-bind:src="media" alt="" />
    </div>
  
    <div class="w-full">
      <input id="caption" class="focus:outline-none bg-gray-200 text-black w-full py-2 px-2 rounded" placeholder="Caption" type="text">
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
export default {
  name: "UploadForm",
  data() {
    return {
      media: "",
    };
  },
  methods: {
    openFile() {
      this.$refs["attachment"].click();
    },
    previewImage() {
      let image = document.querySelector("#attachment").files[0];
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = (e) => {
        this.media = e.target.result;
      };
    },
  },
};
</script>

<style>
</style>