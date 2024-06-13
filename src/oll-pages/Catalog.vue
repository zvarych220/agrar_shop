<template>
    <div>
      <Menu />
      <Plants_protecting_tools />
      <Plants_protecting_tools_info />
      <Footer />
    </div>
  </template>
  
  <script>
  
  import Menu from '@/components/Menu.vue';
  import Footer from '@/components/footer.vue';
  import Plants_protecting_tools from '@/components/catalog-element/Plants_protecting_tools.vue';
  import Plants_protecting_tools_info from '@/components/catalog-element/Plants_protecting_tools-info.vue';
  export default {
    components: {
      Menu,
      Footer,
      Plants_protecting_tools,
      Plants_protecting_tools_info
    },
    data() {
      return {
      };
    }
  };
  </script>

<style>

</style>