<template>
    <div class="container">
      <button 
        @mouseover="handleMouseOver" 
        @mouseout="handleMouseOut"
        @click="handleClick"
      >
        <img :src="currentImage" alt="email button" />
      </button>
        <a href="" class="email">DAT@gmail.com</a>
    </div>
  </template>
  
  <script>
  import Email from '../assets/email.svg';
  import Email_hover from '../assets/email-hover.svg';
  
  export default {
    data() {
      return {
        Email,
        Email_hover,
        currentImage: Email
      };
    },
    methods: {
      handleMouseOver() {
        this.currentImage = this.Email_hover;
      },
      handleMouseOut() {
        this.currentImage = this.Email;
      },
      handleClick() {
       
      }
    }
  };
  </script>
  
  <style scoped>
  .container {
    margin-top: 20px;
    margin-left: -19px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  button {
    margin-right: 10px;
    padding: 0;
    background-color: rgba(0, 0, 0, 0.0);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .email {
    margin: 0;
    text-decoration: none;
    color :#000;
  }
  </style>
  