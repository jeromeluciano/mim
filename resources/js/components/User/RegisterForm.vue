<template>
  <div class="w-full space-y-2 p-4 lg:w-2/4 h-auto mx-auto space-y-4">
    <div class="flex flex-col space-y-1">
      <label class="font-semibold text-white">Name</label>
      <input required v-model="form.name" class="bg-secondary h-10 rounded w-auto px-2 text-white" type="text">
    </div>

    <div class="flex flex-col space-y-1 mb-2">
      <label class="font-semibold text-white">Email</label>
      <input required v-model="form.email" id="email" class="bg-secondary h-10 rounded w-auto px-2 text-white" type="email">
    </div>
    <div class="flex flex-col space-y-1">
      <label class="font-semibold text-white">Password</label>
      <input required v-model="form.password" id="password" class="bg-secondary h-10 rounded w-auto px-2 text-white" type="password">
    </div>
    
    <button @click.prevent="register" class="bg-pink-600 text-white text-md font-semibold p-2 rounded">
      Create Account
    </button>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
import axios from 'axios'
export default {
  data () {
    return {
      form: {
        name: '',
        email: '',
        password: ''
      }
    }
  },

  methods: {
    resetData() {
      this.form.name = ''
      this.form.email = ''
      this.form.password = ''
    },
    register() {
      //  validate user info
      if (
        this.form.name.length >= 3 &&
        this.form.email.length > 0 &&
        this.form.password.length >= 8
      ) {
        const formData = new FormData()
        formData.append('name', this.form.name)
        formData.append('email', this.form.email)
        formData.append('password', this.form.password)

        axios.post('/api/user/register', formData)
          .then((response) => {
            // notification pop up
            console.log(response.data)
            this.resetData()
           this.$toastr.s('Success', 'Registration Successful')
          })
          .catch((response) => {
            // error popup
            console.log(response)
            this.$toastr.e('The credentials you input is already taken or invalid', 'Registration failed')
          })
      }
    }
  }
}
</script>

<style>

</style>