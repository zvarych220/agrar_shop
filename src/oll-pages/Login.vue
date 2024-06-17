<template>
    <div class="login-container">
        <Menu />
        <Login />
        <Footer />
    </div>
  </template>
  
  <script>
  import Menu from '@/components/Menu.vue';
  import Footer from '@/components/footer.vue';
  import Login from '@/components/login/log.vue';
  
  export default {
    components: {
        Menu,
        Footer,
        Login
    },
    data() {
        return {};
    }
  };
  </script>
  
  <style>
  .login-container {
    background-image: url('@/assets/register_bg.png');
    background-size: cover;
    background-position: center top;
    background-repeat: no-repeat;
    height: 100%;
  
    flex-direction: column;
  
  }
  
  .main-container > * {
    z-index: 1;
  }
  
  
  
  
  
  </style>
  