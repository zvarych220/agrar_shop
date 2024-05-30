<template>
    <main>
      <div class="section">
        <div class="menu">
          <div class="menu-pole">
            <div class="menu-pole-link-about-us" id="app">
              <nav>
                <transition name="fade" mode="out-in">
                  <li class="menu-pole-link-down " v-if="!show" @click="show = !show" key="menu">
                    <a class="menu-pole-link" href="">Про нас</a>
                    <img :src="downArrow" class="menu-pole-img">
                  </li>
                </transition>
                <transition name="fade">
                  <ul v-if="show" class="menu-links">
                    <li v-for="item in items">{{item}}</li>
                  </ul>
                </transition>
              </nav>
            </div>
            <ul class="menu-links">
              <li><a href="" class="menu-pole-link">Каталог продукції</a></li>
              <li><a href="" class="menu-pole-link">Оплата і доставка</a></li>
              <li><a href="" class="menu-pole-link">Партнери</a></li>
              <li><a href="" class="menu-pole-link">Новини</a></li>
              <li><a href="" class="menu-pole-link">Контакти</a></li>
            </ul>
          </div>
          <div class="menu-login">
            <ul>
                <li><img :src="groupImage" class="menu-pole-login-img" alt="">
            <a href="" class="menu-pole-login">Вхід | Реєстрація</a></li>
        </ul>
          </div>
        </div>
      </div>
    </main>
  </template>
  
  <script>
  import downArrow from '../assets/down-arrow.png';
  import groupImage from '../assets/Group.svg';
  
  export default {
    data() {
      return {
        downArrow,
        groupImage,
        show: false, 
        items: ['Пункт 1', 'Пункт 2', 'Пункт 3'], 
      };
    },
  };
  </script>
  
  <style scoped>
 
  .menu {
  display: flex; 
  align-items: center; 
}
  .menu-pole-link-down{
    list-style-type: none;
  }
  .menu-pole {
  display: flex;
  justify-content: flex-start; 
  align-items: center;
  flex-grow: 1;
}

.section{
    margin-left: 404px;
    margin-right: 422px;
}
  .menu-pole-link-about-us {
    display: flex; 
    align-items: center;
    justify-content: flex-start; 
    margin-right: 20px; 
  }
  
  .menu-links {
    display: flex;
    list-style: none;
    padding: 0;
    justify-content: flex-start; 
  }
  
  .menu-links li {
    margin-right: 20px; 
  }
  .menu-login li{
    list-style-type: none;
  }
  .menu-pole-link {
    font-weight: 300;
    font-size: 16px;
    color: #fff;
    font-family: var(--font-family);
    text-decoration: none;
    align-items: center;
  }
  
  .menu-pole-img {
    padding-left: 4px;
  }
  
  .menu-login {
    display: flex;
    align-items: center;
    padding-left: 20px; 
    border-left: 1px solid #ccc; 
  }
  
  .menu-pole-login {
    font-weight: 300;
    font-size: 16px;
    color: #fff;
    font-family: var(--font-family);
    text-decoration: none;
    margin-top: 1px;
  }
  
  .menu-pole-login-img {
    margin-left: 15px;
    margin-right: 10px;
  }
  
  .menu-pole-link:hover,
  .menu-pole-login:hover {
    color: #84BE51; 
  }
  
  main {
    position:absolute;
top:0px;
left:0px;
width: 100%;

  background: #1e6140;
}

  </style>
  