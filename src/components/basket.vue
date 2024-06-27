<template>
  <router-link to="/shopping_cart">
    <button 
      @mouseover="handleMouseOver" 
      @mouseout="handleMouseOut"
      @click="handleClick"
    >
      <img :src="currentImage" alt="basket button" />
    </button>
  </router-link>
</template>

<script>
import Shop from '../assets/shop.svg';
import Shop_hover from '../assets/shop-hover.svg';

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
      // Optional: Handle any click actions here if needed
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
