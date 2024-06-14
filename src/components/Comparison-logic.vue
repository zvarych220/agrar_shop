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
  