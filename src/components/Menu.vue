<template>
  <main>
    <div class="section">
      <div class="menu">
        <div class="menu-pole">
          <div class="menu-pole-link-about-us" id="app">
            <nav>
              <i class="menu-pole-link-down" @click="show = !show">
                <a class="menu-pole-link" href="#">
                  Про нас <img :src="downArrow" class="menu-pole-img">
                </a>
              </i>
              <transition name="fade">
                <ul v-if="show" class="sub-menu-links">
                  <li class="menu-item" v-for="(item, index) in items" :key="index">{{ item }}</li>
                </ul>
              </transition>
            </nav>
          </div>
          <ul class="main-menu-links">
            <li><a href="#" class="menu-pole-link">Каталог продукції</a></li>
            <li><a href="#" class="menu-pole-link">Оплата і доставка</a></li>
            <li><a href="#" class="menu-pole-link">Партнери</a></li>
            <li><a href="#" class="menu-pole-link">Новини</a></li>
            <li><a href="#" class="menu-pole-link">Контакти</a></li>
          </ul>
        </div>
        <div class="menu-login">
          <a href="#" class="menu-pole-login">
            <div class="menu-login-href">
              <img :src="groupImage" class="menu-pole-login-img" alt="">Вхід | Реєстрація
            </div>
          </a>
        </div>
      </div>
    </div>
  </main>

  <section>
    <div class="section">
      <div class="menu-tools">
        <div class="menu-tools-first">
          <img :src="logobrend" alt="" class="menu-tools-logo">
          <SearchPole />
          <div class="menu-tools-phone">
            <PhoneButton />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import downArrow from '../assets/down-arrow.png';
import groupImage from '../assets/Group.svg';
import logobrend from '../assets/Logo-brend.svg';
import PhoneButton from './PhoneButton.vue'; 
import SearchPole from './Search_pole.vue'; 

export default {
  components: {
    PhoneButton, 
    SearchPole
  },
  data() {
    return {
      downArrow,
      groupImage,
      logobrend,
      show: false,
      items: ['Наша команда', 'Партнери', 'Договір'],
    };
  },
};
</script>

<style scoped>
.menu-login-href {
  align-items: center;
  display: flex;
  margin-right: 20px;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity .3s ease;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.menu {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.menu-pole-link-down {
  cursor: pointer;
  display: flex;
  align-items: center;
  position: relative;
}

.menu-pole {
  display: flex;
  align-items: center;
  flex-grow: 1;
}

.section {
  margin-left: 404px;
  margin-right: 422px;
}

.menu-pole-link-about-us {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  margin-right: 20px;
  flex-direction: column;
}

.menu-item {
  align-items: center;
  color: #fff;
  cursor: pointer;
  list-style-type: none;
  transition: all .3s ease;
}

.main-menu-links {
  display: flex;
  list-style: none;
  padding: 0;
  justify-content: space-between;
  flex-grow: 1;
  margin: 0;
}

.main-menu-links li {
  margin-right: 20px;
  flex: 1;
  text-align: center;
}

.sub-menu-links {
  display: flex;
  list-style: none;
  flex-direction: column;
  position: fixed;
  background: #347153;
  padding: 10px 0;
  z-index: 1000;
  width: max-content;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  justify-content: space-between;
  margin-top: 0;
}

.sub-menu-links li {
  margin-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;
}

.menu-pole-link {
  font-weight: 300;
  font-size: 16px;
  color: #fff;
  font-family: var(--font-family);
  text-decoration: none;
  align-items: center;
  display: block;
  padding: 10px 0;
  margin-right: 10px;
}

.menu-pole-img {
  padding-left: 4px;
}

i {
  font-style: normal;
}

.menu-login {
  display: flex;
  align-items: center;
  padding-left: 20px;
  margin-right: 20px;
  border-left: 1px solid #ccc;
}

.menu-pole-login {
  font-weight: 300;
  font-size: 16px;
  color: #fff;
  font-family: var(--font-family);
  text-decoration: none;
  margin-top: 1px;
  padding: 10px 0;
}

.menu-pole-login-img {
  margin-left: 15px;
  margin-right: 10px;
}

.menu-pole li:hover {
  background-color: #347153;
}

.menu-pole :hover {
  color: #84BE51;
}

.menu-login :hover {
  background-color: #347153;
  color: #84BE51;
}
.menu-pole-link-down :hover {
  background-color: #347153;
}

main {
  position: relative;
  top: 0px;
  left: 0px;
  width: 100%;
  background: #1e6140;
}

.menu-tools-first {
  display: flex;
  margin-top: 20px;
}

.menu-tools-logo {
  width: 158px;
  height: 71px;
  margin-left: 3px;
}

</style>
