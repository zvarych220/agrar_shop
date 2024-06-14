<template>
    <button 
      @mouseover="handleMouseOver" 
      @mouseout="handleMouseOut"
      @click="handleClick"
    >
      <img :src="currentImage" alt="Help the agronomist button" />
    </button>
  </template>
  
  <script>
  import Help_the_agronomist from '../assets/Help_the_agronomist.svg';
  import Help_the_agronomist_hover from '../assets/Help_the_agronomist_hover.svg';
  
  export default {
    data() {
      return {
        Help_the_agronomist,
        Help_the_agronomist_hover,
        currentImage: Help_the_agronomist
      };
    },
    methods: {
      handleMouseOver() {
        this.currentImage = this.Help_the_agronomist_hover;
      },
      handleMouseOut() {
        this.currentImage = this.Help_the_agronomist;
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
  