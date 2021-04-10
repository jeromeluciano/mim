<template>
  <div id="app" class="bg-primary h-auto">
    <header>
      <Navbar></Navbar>
    </header>

    <main class="bg-primary h-auto">
      <DropdownNavbar> </DropdownNavbar>
      <div class="mx-4 my-2">
        <router-view/>
      </div>
      
      <login-popup> </login-popup>
      
    </main>

    
  </div>
</template>

<script>

import Navbar from './components/Navbar/Navbar'
import DropdownNavbar from './components/Navbar/DropdownNavbar'
import LoginPopup from './components/Auth/LoginPopup.vue'

export default {
  name: 'App',
  components: {
    Navbar,
    DropdownNavbar,
    LoginPopup
  }
}
</script>

