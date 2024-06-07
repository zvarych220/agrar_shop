<template>
    <button 
      @mouseover="handleMouseOver" 
      @mouseout="handleMouseOut"
      @click="handleClick"
    >
      <img :src="currentImage" alt="environment button" />
    </button>
  </template>
  
  <script>
  import environment from '../assets/environment.svg';
  import environment_hover from '../assets/environment-hover.svg';
  
  export default {
    data() {
      return {
        environment,
        environment_hover,
        currentImage: environment
      };
    },
    methods: {
      handleMouseOver() {
        this.currentImage = this.environment_hover;
      },
      handleMouseOut() {
        this.currentImage = this.environment;
      },
      handleClick() {
        // Add your click handling logic here
      }
    }
  };
  </script>
  
  <style scoped>
  button {
    margin-left: 15px;
    margin-top: 13px;
    padding: 0;
    background-color: #fff;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  </style>
  