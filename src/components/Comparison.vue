<template>
    <button 
      @mouseover="handleMouseOver" 
      @mouseout="handleMouseOut"
      @click="handleClick"
    >
      <img :src="currentImage" alt="comparison button" />
    </button>
  </template>
  
  <script>
  import comparisonImage from '../assets/comparison.svg';
  import comparisonImageHover from '../assets/comparison-hover.svg';
  
  export default {
    data() {
      return {
        comparisonImage,
        comparisonImageHover,
        currentImage: comparisonImage
      };
    },
    methods: {
      handleMouseOver() {
        this.currentImage = this.comparisonImageHover;
      },
      handleMouseOut() {
        this.currentImage = this.comparisonImage;
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
  