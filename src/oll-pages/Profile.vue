<template>
    <div class="main-container">
        <Menu />
        <Profile />
        <Footer />
    </div>
  </template>
  
  <script>
  import Menu from '@/components/Menu.vue';
  import Footer from '@/components/footer.vue';
  import Profile from '@/components/profile/prof.vue';
  
  export default {
    components: {
        Menu,
        Footer,
        Profile
    },
    data() {
        return {};
    }
  };
  </script>
  
  <style>
  </style>
  