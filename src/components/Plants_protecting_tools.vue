<template>
  <button 
    @mouseover="handleMouseOver" 
    @mouseout="handleMouseOut"
    @click="navigateToCatalog"
  >
    <img :src="currentImage" alt="Plants_protecting_tools_hover button" />
  </button>
</template>

<script>
import Plants_protecting_tools from '../assets/Plants-protecting-tools.svg';
import Plants_protecting_tools_hover from '../assets/Plants-protecting-tools-hover.svg';

export default {
  data() {
    return {
      Plants_protecting_tools,
      Plants_protecting_tools_hover,
      currentImage: Plants_protecting_tools
    };
  },
  methods: {
    handleMouseOver() {
      this.currentImage = this.Plants_protecting_tools_hover;
    },
    handleMouseOut() {
      this.currentImage = this.Plants_protecting_tools;
    },
    navigateToCatalog() {
      this.$router.push({ name: 'Catalog' });
    }
  }
};
</script>

<style scoped>
button {
  margin-left: 15px;
  margin-top: 13px;
  padding: 0;
  background-color: rgba(0, 0, 0, 0.0);
  border: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
