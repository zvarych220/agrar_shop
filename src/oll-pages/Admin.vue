<template>
    <div class="main-container">
        <Menu />
        <Profil_admin />
        <Footer />
    </div>
  </template>
  
  <script>
  import Menu from '@/components/Menu.vue';
  import Footer from '@/components/footer.vue';
  import Profil_admin from '@/components/profil_admin/admin_prof.vue';
  
  export default {
    components: {
        Menu,
        Footer,
        Profil_admin
    },
    data() {
        return {};
    }
  };
  </script>
  
  <style>
  </style>
  