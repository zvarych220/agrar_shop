<template>
    <div class="button-phone-container">
      <button class="buttone-phone" @mouseover="isHovered = true" @mouseout="isHovered = false" @click="show = !show">
        <img :src="isHovered ? phone_hover : phone" alt="">
      </button>
      <div class="phone-number">
        <ul class="phone-number-list">
          <li class="no-wrap" @click="show = !show">
            +38 (067) 115 00 58 <img :src="downArrow" class="phone-number-list-img">
          </li>
          <li class="no-wrap">
            <a href="#" class="phone-number-list-link" @click.prevent="show = !show">Замовити зворотній зв’язок</a>
          </li>
        </ul>
        <transition name="fade">
          <ul v-if="show" class="sub-phone-menu-links">
            <li class="no-wrap" v-for="(item, index) in items" :key="index">{{ item }}</li>
          </ul>
        </transition>
      </div>
    </div>
  </template>
  
  <script>
  import phone from '../assets/phone.svg';
  import phone_hover from '../assets/phone-hover.svg';
  import downArrow from '../assets/down-arrow.png';
  
  export default {
    data() {
      return {
        phone,
        phone_hover,
        downArrow,
        isHovered: false,
        show: false,
        items: ['+38 (067) 115 00 58', '+38 (067) 115 00 58'],
      };
    },
  };
  </script>
  
  <style scoped>
  .buttone-phone {
    background-color: rgba(0, 0, 0, 0.0);
    width: 40px;
    height: 40px;
    border: none;
    cursor: pointer;
    padding: 0;
  }
  
  .phone-number-list {
    list-style: none;
    padding-left: 6px; 
    margin: 0; 
  }
  
  .button-phone-container {
    display: flex;
    margin-left: 56px;
    margin-top: 13px;
    align-items: center;
    position: relative; 
  }
  
  .phone-number {
    margin-left: 6px;
  }
  
  .no-wrap {
    white-space: nowrap;
  }
  
  .phone-number-list-link {
    color: #84BE51;
  }
  
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity .3s ease;
  }
  
  .fade-enter,
  .fade-leave-to {
    opacity: 0;
  }
  
  .sub-phone-menu-links {
    margin-left: 50px;
    display: flex;
    list-style: none;
    flex-direction: column;
    background: #fff; 
    padding: 10px 0;
    z-index: 1000;
    width: max-content;
    border-radius: 20px;
    justify-content: space-between;
    margin-top: 10px;
    position: absolute;
    top: 100%;
    left: 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
  }
  
  .sub-phone-menu-links li {
    margin-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
    color: #000;
    cursor: pointer;
  }
  
  .sub-phone-menu-links li:hover {
    background-color: #84BE51;
  }
  </style>
  