<template>
    <button 
      @mouseover="handleMouseOver" 
      @mouseout="handleMouseOut"
      @click="handleClick"
    >
      <img :src="currentImage" alt="About_use_btn button" />
    </button>
  </template>
  
  <script>
  import About_use_btn from '@/assets/About_use_btn.svg';
  import About_use_btn_hover from '@/assets/About_use_btn_hover.svg';


  
  export default {
    data() {
      return {
        About_use_btn, 
        About_use_btn_hover,
        currentImage: About_use_btn
      };
    },
    methods: {
      handleMouseOver() {
        this.currentImage = this.About_use_btn_hover;
      },
      handleMouseOut() {
        this.currentImage = this.About_use_btn;
      },
      handleClick() {
        
      }
    }
  };
  </script>
  
  <style scoped>
  button {
    
    margin-top: 13px;
    padding: 0;
    background-color: rgba(0, 0, 0, 0.0);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: inherit;
  }
  </style>
  