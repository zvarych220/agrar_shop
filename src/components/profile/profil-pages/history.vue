<template>
    <div class="main-container">
        <Menu />
        <menu_prof />
        <Footer />
    </div>
  </template>
  
  <script>
  import Menu from '@/components/Menu.vue';
  import Footer from '@/components/footer.vue';
  import menu_prof from "@/components/profile/comp_prof/menu_prof.vue";
  
  export default {
    components: {
        Menu,
        Footer,
        menu_prof
    },
    data() {
        return {};
    }
  };
  </script>
  
  <style>
  </style>
  