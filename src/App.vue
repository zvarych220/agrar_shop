<template>
  <div id="#app">
    <Menu />
  </div>
</template>

<script>
import Menu from './components/Menu.vue';

export default {
  components: {
    Menu,
  },
};
</script>

<style>
html, body {
  margin: 0;
  padding: 0;
}

#app {
  margin: 0;
  padding: 0;
}
</style>