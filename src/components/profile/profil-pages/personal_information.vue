<template>
    <div class="main-container">
        <Menu />
        <personal_information />

        <Footer />
    </div>
  </template>
  
  <script>
  import Menu from '@/components/Menu.vue';
  import Footer from '@/components/footer.vue';
  import menu_prof from "@/components/profile/comp_prof/menu_prof.vue";
  import personal_information from "@/components/profile/profil-pages/profil-pages_comp/personal_information.vue";
  export default {
    components: {
        Menu,
        Footer,
        personal_information
    },
    data() {
        return {};
    }
  };
  </script>
  
  <style>
  </style>
  