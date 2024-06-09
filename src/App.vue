<template>
  <div id="app">
    <Menu />
    <Index />
    <about_us />
    <Novelty />
    

  </div>

</template>


<script>

import Menu from '@/components/Menu.vue';
import Novelty from './components/index/Novelty.vue';
import Index from './components/index/index.vue';
import about_us from './components/index/about_us.vue';
export default {
  components: {
    Menu,
    Novelty,
    Index,
    about_us,


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
