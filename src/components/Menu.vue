<template>
  <main>
    <div class="section">
      <div class="menu">
        <div class="menu-pole">
          <div class="menu-pole-link-about-us" id="app">
            <nav>
              <i class="menu-pole-link-down" @click="toggleMenu">
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
            <li><a @click.prevent="navigateToCatalog" class="menu-pole-link">Каталог продукції</a></li>
            <li><a href="#" class="menu-pole-link">Оплата і доставка</a></li>
            <li><a href="#" class="menu-pole-link">Партнери</a></li>
            <li><a href="#" class="menu-pole-link">Новини</a></li>
            <li><a href="#" class="menu-pole-link">Контакти</a></li>
          </ul>
        </div>
        <div class="menu-login">
          <a href="#" class="menu-pole-login" @click="handleLoginClick">
            <div class="menu-login-href">
              <img :src="groupImage" class="menu-pole-login-img" alt="">{{ loginText }}
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
          <img :src="logobrend" alt="" class="menu-tools-logo" @click="navigateToHome">
          <SearchPole />
          <div class="menu-tools-phone">
            <PhoneLogik />
            <LikeButtone />
            <Comparison />
            <Shop />
          </div>
        </div>
        <div class="menu-tools-second">
          <Environment />
          <Plants_protecting_tools />
          <Fertilizers />
          <Feed_group />
          <Help_the_agronomist />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import downArrow from '../assets/down-arrow.png';
import groupImage from '../assets/Group.svg';
import logobrend from '../assets/Logo-brend.svg';
import PhoneLogik from './PhoneLogik.vue';
import SearchPole from './Search_pole.vue';
import LikeButtone from './Like_buttone.vue';
import Comparison from './Comparison-logic.vue';
import Shop from './basket.vue';
import Environment from './Environment.vue';
import Plants_protecting_tools from './Plants_protecting_tools.vue';
import Fertilizers from "./Fertilizers.vue";
import Feed_group from "./Feed_group.vue";
import Help_the_agronomist from "./Help_the_agronomist.vue";

export default {
  components: {
    PhoneLogik,
    SearchPole,
    LikeButtone,
    Comparison,
    Shop,
    Environment,
    Plants_protecting_tools,
    Fertilizers,
    Feed_group,
    Help_the_agronomist,
  },
  data() {
    return {
      downArrow,
      groupImage,
      logobrend,
      show: false,
      items: ['Наша команда', 'Партнери', 'Договір'],
      loginText: 'Вхід | Реєстрація'
    };
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
    this.checkLoginStatus();
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    toggleMenu() {
      this.show = !this.show;
    },
    handleScroll() {
      if (this.show) {
        this.show = false;
      }
    },
    navigateToCatalog() {
      this.$router.push({ name: 'Catalog' });
    },
    navigateToHome() {
      this.$router.push({ name: 'Home' });
    },
    navigateToRegister() {
      this.$router.push({ name: 'Register' });
    },
    handleLoginClick() {
      const role = localStorage.getItem('role');
      if (this.loginText === 'Вхід | Реєстрація') {
        this.navigateToRegister();
      } else {
        if (role === '1') {
          this.navigateToProfileAdmin();
        } else {
          this.navigateToProfile();
        }
      }
    },
    navigateToProfile() {
      this.$router.push({ name: 'Profile' });
    },
    navigateToProfileAdmin() {
      this.$router.push({ name: 'ProfileAdmin' });
    },
    checkLoginStatus() {
      const token = localStorage.getItem('token');
      const role = localStorage.getItem('role');
      if (token) {
        this.loginText = 'Профіль';
        // Не робимо перенаправлення у методі checkLoginStatus
      }
    }
  }
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
  flex: 1;
  text-align: center;
  white-space: nowrap;
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

.menu-tools {
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 180px;
}

.menu-tools-first {
  margin-top: -100px;
  display: flex;
  align-items: center;
}

.menu-tools-logo {
  width: 158px;
  height: 71px;
  margin-left: 3px;
  cursor: pointer;
}

.menu-tools-phone {
  display: flex;
  align-items: center;
}

.menu-tools-second {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}
</style>
