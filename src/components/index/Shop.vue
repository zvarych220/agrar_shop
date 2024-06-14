<template>
  <button 
    @mouseover="handleMouseOver" 
    @mouseout="handleMouseOut"
    @click="handleClick"
  >
    <img :src="currentImage" alt="Shop button" />
  </button>
</template>

<script>
import Shop from '@/assets/shop.svg';
import Shop_hover from '@/assets/shop-hover.svg';

export default {
  data() {
    return {
      Shop,
      Shop_hover,
      currentImage: Shop
    };
  },
  methods: {
    handleMouseOver() {
      this.currentImage = this.Shop_hover;
    },
    handleMouseOut() {
      this.currentImage = this.Shop;
    },
    handleClick() {

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
