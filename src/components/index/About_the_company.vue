<template>
  <button 
    @mouseover="handleMouseOver" 
    @mouseout="handleMouseOut"
    @click="handleClick"
  >
    <img :src="currentImage" alt="About_the_company button" />
  </button>
</template>

<script>
import About_the_company from '@/assets/About_the_company.svg';
import About_the_company_hover from '@/assets/About_the_company_hover.svg';

export default {
  data() {
    return {
      About_the_company, 
      About_the_company_hover,
      currentImage:About_the_company
    };
  },
  methods: {
    handleMouseOver() {
      this.currentImage = this.About_the_company_hover;
    },
    handleMouseOut() {
      this.currentImage = this.About_the_company;
    },
    handleClick() {
      
    }
  }
};
</script>

<style scoped>
button {
  margin-left: 30px;
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
