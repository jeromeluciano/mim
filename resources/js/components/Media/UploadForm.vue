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
      <video controls v-if="mimeType.startsWith('video')" v-bind:src="attachment"></video>
      <img v-else-if="mimeType.startsWith('image')" class="w-auto h-auto" v-bind:src="attachment" alt="" />
    </div>

    <div class="flex justify-center items-center relative mt-2">
      <button
        @click.prevent="uploadToCloud"
        class="absolute left-0 top-1 focus:ring-2 focus:outline-none hover:opacity-90 bg-pink-600 text-white px-4 py-2 rounded-md"
        :disabled="media == null"
        :class="{'disabled:opacity-50': media == null}"
      >
        Create
      </button>
    </div>
  </form>
</template>

<script>
import axios from 'axios'
import { DataExchange } from 'aws-sdk';
const { v4: uuidv4 } = require('uuid');
export default {
  name: "UploadForm",
  data() {
    return {
      attachment: null,
      media: null,
      mimeType: '',
      s3: null,
      binaryString: null,
    };
  },
  methods: {
    openFile() {
      this.$refs["attachment"].click();
    },
    previewImage(e) {
      let media = document.querySelector("#attachment").files[0];
      if (media == undefined) return;
      this.mimeType = media.type
      window.mimeType = media.type
      this.media = media;
      let reader = new FileReader();
      if (this.mimeType.startsWith('image')) {
        let previewReader = new FileReader();
        previewReader.readAsDataURL(media)
        previewReader.onload = (e) => {
          this.attachment = e.target.result
        }
        reader.readAsArrayBuffer(media)
        reader.onload = (e) => {
          
          this.binaryString = e.target.result
        }
        
      }
      else if (this.mimeType.startsWith('video')) {
        let blobURL = URL.createObjectURL(media)
        reader.readAsArrayBuffer(media)
        reader.onload = (e) => {
          this.binaryString = e.target.result
        }
      
        // console.log(blobURL)
        this.attachment = blobURL
      }
    },
    async uploadToCloud () {

      if (this.attachment == null || this.mimeType == '' || this.media == null) {
        console.log ('invalid input')
        return
      }
      const extension = this.media.type.split('/')[1]
      if (this.mimeType.startsWith('image')) {
        let formData = new FormData();
        formData.set('attachment', this.media);

        const data = {
          binaryString: this.binaryString,
          extension: extension,
          mediaType: this.media.type
        }

        await this.s3ImageUpload(data)
        // axios.post('/api/tweet', formData, {
        //   headers: {
        //     'content-type': 'multipart/form-data'
        //   }
        // }).then( () => {
        //   // show notification
        //   this.resetData();
        // })
      }
      else if (this.mimeType.startsWith('video')) {
        const data = {
          binaryString: this.binaryString,
          extension: extension,
          mediaType: this.media.type
        }
        await this.s3VideoUpload(data)
      }
    },

    async s3VideoUpload (data) {
      const AWS = require('aws-sdk')

      const spacesEndPoint = new AWS.Endpoint(process.env.MIX_DO_SPACES_ENDPOINT)
      const s3 = new AWS.S3({
        endpoint: spacesEndPoint,
        accessKeyId: process.env.MIX_DO_SPACES_KEY,
        secretAccessKey: process.env.MIX_DO_SPACES_SECRET
      })

      const params = {
        Bucket: 'mimspace/videos',
        Key: `${uuidv4()}.${data.extension}`,
        Body: data.binaryString,
        ACL: 'public-read-write',
        ContentType: data.mediaType,
      }
      
      let { Location } = await s3.upload(params).promise()
        .then(data => data)

      if (Location == undefined) return
      const metadata = {
        mimeType: data.mediaType,
        url: Location,
      }
      
      await this.createVideoTweet(metadata)
    },

    async s3ImageUpload (data) {
      const AWS = require('aws-sdk')

      const spacesEndPoint = new AWS.Endpoint(process.env.MIX_DO_SPACES_ENDPOINT)
      const s3 = new AWS.S3({
        endpoint: spacesEndPoint,
        accessKeyId: process.env.MIX_DO_SPACES_KEY,
        secretAccessKey: process.env.MIX_DO_SPACES_SECRET
      })

      const params = {
        Bucket: 'mimspace/images',
        Key: `${uuidv4()}.${data.extension}`,
        Body: data.binaryString,
        ACL: 'public-read-write',
        ContentType: data.mediaType,
      }
      
      let { Location } = await s3.upload(params).promise()
        .then(data => data)

      if (Location == undefined) return
      const metadata = {
        mimeType: data.mediaType,
        url: Location,
      }
      await this.createImageTweet(metadata)
    },

    async createVideoTweet (data) {
      const formData = new FormData()
      formData.append('mime_type', data.mimeType)
      formData.append('media_streamable_url', data.url)
      console.log(this.mimeType, data.location)
      axios.post('/api/tweet-video', formData)
        .then(response => this.$toastr.s('Upload success'))
    },

    async createImageTweet (data) {
      const formData = new FormData()
      formData.append('mime_type', data.mimeType)
      formData.append('media_url', data.url)
      axios.post('/api/tweet-image', formData)
        .then(response => this.$toastr.s('Upload success'))
    },

    resetData () {
      this.attachment = null
      this.media = null
      this.mimeType = ''
    }
  }
};
</script>

<style>
</style>