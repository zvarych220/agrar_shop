<template>
    <div id="app">
      <Menu />
      <Index />
      <about_us />
      <Novelty />
      <Novelty_2 />
      <Partners />
      <Seed />
      <Footer />
    </div>
  
  </template>
  
  
  <script>
  
  import Menu from '@/components/Menu.vue';
  import Novelty_2 from '@/components/index/novelty_2.vue';
  import Novelty from '@/components/index/novelty.vue';
  import Index from '@/components/index/index.vue';
  import about_us from '@/components/index/about_us.vue';
  import Seed from '@/components/index/Seed.vue';
  import Partners from '@/components/index/partners.vue';
  import Footer from '@/components/footer.vue';
  export default {
    components: {
      Menu,
      Novelty,
      Index,
      about_us,
      Novelty_2,
      Seed,
      Partners,
      Footer
    },
    data() {
      return {
      };
    }
  };
  </script>
  
  
  <style>
  :root {
    --font-family: "Montserrat", sans-serif;
    --second-family: "Roboto", sans-serif;
  }
  
  html,
  body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    width: 100%;
  }
  
  #app {
    margin: 0;
    padding: 0;
    
  }
  
  </style>
  