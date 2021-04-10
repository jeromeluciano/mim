<template>
  <div>
    <h1 class="text-white text-2xl font-semibold text-center mb-2">Publish your Meme 🔥</h1>
    <upload-form> </upload-form>
  </div>
</template>

<script>
import UploadForm from '../components/Media/UploadForm'
export default {
  name: 'create',
  components: {
    UploadForm
  }
}
</script>

<style>

</style>