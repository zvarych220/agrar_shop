<template>
  <button 
    @mouseover="handleMouseOver" 
    @mouseout="handleMouseOut"
    @click="handleClick"
  >
    <img :src="currentImage" alt="like button" />
  </button>
</template>

<script>
import likeButtonImage from '../assets/like.svg';
import likeButtonImageHover from '../assets/like-hover.svg';

export default {
  data() {
    return {
      likeButtonImage,
      likeButtonImageHover,
      currentImage: likeButtonImage
    };
  },
  methods: {
    handleMouseOver() {
      this.currentImage = this.likeButtonImageHover;
    },
    handleMouseOut() {
      this.currentImage = this.likeButtonImage;
    },
    handleClick() {
      // Add your click handling logic here
    }
  }
};
</script>

<style scoped>
button {
  padding: 0;
  background-color: #fff;
  border: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
