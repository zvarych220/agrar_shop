<template>
    <button 
      @mouseover="handleMouseOver" 
      @mouseout="handleMouseOut"
      @click="handleClick"
    >
      <img :src="currentImage" alt="Fertilizers button" />
    </button>
  </template>
  
  <script>
  import Fertilizers from '../assets/Fertilizers.svg';
  import Fertilizers_hover from '../assets/Fertilizers-hover.svg';
  
  export default {
    data() {
      return {
        Fertilizers,
        Fertilizers_hover,
        currentImage: Fertilizers
      };
    },
    methods: {
      handleMouseOver() {
        this.currentImage = this.Fertilizers_hover;
      },
      handleMouseOut() {
        this.currentImage = this.Fertilizers;
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
  