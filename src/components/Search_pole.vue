<template>
    <div class="menu-tools-search">
      <form action="/search" method="get" class="menu-tools-form-search">
        <input type="text" id="search" name="q" placeholder="Пошук" class="input-search">
        <button type="submit" class="button-search">
          <img :src="search" alt="">
        </button>
      </form>
    </div>
  </template>
  
  <script>
  import search from '../assets/search.png';
  
  export default {
    data() {
      return {
        search
      };
    }
  };
  </script>
  
  <style scoped>
  .menu-tools-search{
    margin-left: 30px;
    margin-top: 13px;
  }
  .menu-tools-form-search {
    display: flex;
    margin: 0 auto;
    width: 342px;
    height: 40px;
  }
  
  .input-search {
    padding-left: 19px;
    top: 84px;
    left: 595px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 90px;
    width: 342px;
    font-family: var(--font-family);
    padding-right: 50px;
  }
  
  .button-search {
    background-color: #fff;
    border: none;
    cursor: pointer;
    margin-left: -50px;
    padding: 0;
    height: 15px;
    width: 15px;
    margin-top: 13px;
    border-left: 1px solid rgba(0, 0, 0, 0.2);
    padding-left: 13px;
    padding-bottom: 6px;
    padding-right: 22px;
  }
  </style>
  