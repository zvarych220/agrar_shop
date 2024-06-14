<template>
    <button 
      @mouseover="handleMouseOver" 
      @mouseout="handleMouseOut"
      @click="handleClick"
    >
      <img :src="currentImage" alt="feed-group button" />
    </button>
  </template>
  
  <script>
  import feed_group from '../assets/feed-group.svg';
  import feed_groupHover from '../assets/feed-group-hover.svg';
  
  export default {
    data() {
      return {
        feed_group,
        feed_groupHover,
        currentImage: feed_group
      };
    },
    methods: {
      handleMouseOver() {
        this.currentImage = this.feed_groupHover;
      },
      handleMouseOut() {
        this.currentImage = this.feed_group;
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
  