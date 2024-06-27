<template>
  <button @click="handleClick" class="shop-button">
    <img :src="currentImage" alt="Shop button" />
  </button>
</template>

<script>
import Shop from '@/assets/shop.svg';
import ShopHover from '@/assets/shop-hover.svg';

export default {
  data() {
    return {
      Shop,
      ShopHover,
      currentImage: Shop
    };
  },
  methods: {
    handleClick() {
      this.$emit('shopClicked');
    }
  }
};
</script>

<style scoped>
.shop-button {
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
