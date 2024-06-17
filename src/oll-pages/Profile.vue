<template>
    <div class="main-container">
        <Menu />
        <Footer />
    </div>
  </template>
  
  <script>
  import Menu from '@/components/Menu.vue';
  import Footer from '@/components/footer.vue';

  
  export default {
    components: {
        Menu,
        Footer
    },
    data() {
        return {};
    }
  };
  </script>
  
  <style>
  </style>
  