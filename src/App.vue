<template>
  <div id="app">
    <Menu />

    <section class="index">
      <img class="red-image" :src="Red" alt="Red overlay image">
      <div class="agricultural-online">
        <div class="agricultural-online-store"></div>
        <div class="section">
          <div class="index-elements">
            <div class="index-elements-h1">
              <img :src="Xz" alt="" class="index-elements-xz">
              <h1>Аграрний</h1>
            </div>
            <p class="index-elements-p">інтернет-магазин</p>
            <p class="index-elements-p-info">Основна сфера діяльності – дистрибуція насіння, засобів захисту рослин,
              мінеральних макро - та мікродобрив</p>
            <About_the_company />
          </div>
        </div>
        <div class="WorkMan-container">
          <img :src="WorkMan" alt="" class="WorkMan">
          <img :src="Two_leaves" alt="" class="Two_leaves">
          <img :src="One_leaf" alt="" class="One_leaf">
        </div>
      </div>
    </section>

    <section class="about_us">
      <div class="about_us-Jugs">
        <div class="Jugs-container">
          <img :src="Jugs" alt="" class="Jugs">
          <img :src="Leaf_to_the_left" alt="" class="Leaf_to_the_left">
          <img :src="Leaf_to_the_right" alt="" class="Leaf_to_the_right">
        </div>
        <div class="about_us_text">
          <div class="about_us_text-title">
            <img :src="Xz" alt="" class="about_us_text-xz">
            <h2>Про нас</h2>
          </div>
          <div class="about_us_text_container">
            <p class="about_us_text_p"> <span class="green-color">«Компанія ТОВ “ДАМАР АГРОТРЕЙД”</span> — молода
              команда, яка з’явилась на
              аграрному ринку у 2020 році. Ми не боїмось труднощів і викликів. Тому навіть складний ковідний період,
              світова пандемія не стали на заваді успішному старту.</p>
              <p class="about_us_text_p">Отже,<span class="green-color"> ми — сміливі, ми — драйвові</span>, ми — ті, що розвивають рослинництво та
              допомагають ставати успішними
              тисячам вітчизняних аграріїв.</p>
              <p class="about_us_text_p"><span class="green-color">Бачення:</span> компанія ТОВ “ДАМАР АГРОТРЕЙД” тримає курс на підвищення
              престижності, довіри до засобів захисту
              рослин made in UA. Прагнемо, аби в кожному регіоні України наш споживач мав доступ до якісної продукції та
              консалтингу від фахівців команди.</p>
              <p class="about_us_text_p"><span class="green-color">Місія:</span> усе продуктове портфоліо, консультативні послуги ТОВ “ДАМАР
              АГРОТРЕЙД” направлені на підвищення
              рентабельності рослинництва в мінливих кліматичних умовах України. Також ставимо собі завдання підвищувати
              обізнаність клієнтів щодо сучасних методів ведення рослинництва...
            </p>
            <About_use_btn />
            
          </div>
          
        </div>
        
      </div>
      
    </section>
    <Novelty /> 
  </div>

</template>


<script>
import Menu from './components/Menu.vue';
import PhotoIndex from './assets/photo-index.png';
import Red from './assets/red.png';
import WorkMan from './assets/work-man.png';
import Xz from './assets/xz.svg';
import About_the_company from './components/index/About_the_company.vue';
import Two_leaves from './assets/two_leaves.png';
import One_leaf from './assets/one_leaf.png';
import Jugs from './assets/jugs.png';
import Leaf_to_the_left from './assets/leaf_to_the_left.png';
import Leaf_to_the_right from './assets/leaf_to_the_right.png';
import About_use_btn from './components/index/About_use.vue';

import Novelty from './components/index/Novelty.vue';

export default {
  components: {
    Menu,
    About_the_company,
    About_use_btn,
    Novelty,
  },
  data() {
    return {
      PhotoIndex,
      Red,
      WorkMan,
      Xz,
      Two_leaves,
      One_leaf,
      Jugs,
      Leaf_to_the_left,
      Leaf_to_the_right,
    };
  }
};
</script>


<style>
:root {
  --font-family: "Montserrat", sans-serif;
  --second-family: "Roboto", sans-serif;
}

html,
body {
  margin: 0;
  padding: 0;
  overflow-x: hidden;
}

#app {
  margin: 0;
  padding: 0;
}

.section {
  margin-left: 400px;
  margin-right: 420px;
}

.agricultural-online-store {
  height: 1000px;
  width: 1277px;
  margin-top: -180px;
  z-index: -10;

  content: "";
  position: absolute;
  background-image: url('./assets/photo-index.png');
  background-size: cover;
  z-index: -10;
}

.red-image {
  position: absolute;
  height: 580px;
  width: 580px;
  top: -172px;
  right: -250px;
  z-index: 1;
}

.index-elements {
  padding-top: 150px;
  margin-left: 13px;
  height: 350px;
  overflow: hidden;
}

.index-elements-xz {
  height: 35px;
  width: 25px;
  margin-right: 10px;
}

.index-elements-h1 {
  display: flex;
  align-items: center;
  margin-top: 50px;
}

h1 {
  font-family: var(--font-family);
  font-size: 55px;
  color: #000;
  margin: 0;
}

.index-elements-p {
  font-family: var(--font-family);
  font-size: 55px;
  color: #000;
  margin: 0;
  margin-left: 30px;
  white-space: nowrap;
  font-weight: normal;
}

.index-elements-p-info {
  font-family: var(--font-family);
  font-weight: 400;
  font-size: 18px;
  color: rgba(0, 0, 0, 0.5);
  margin-left: 30px;
  max-width: 500px;
}

.WorkMan-container {
  overflow: hidden;
}

.WorkMan {
  width: 800px;
  height: 690px;
  position: absolute;
  top: 350px;
  right: 0;
  z-index: 2;
}

.Two_leaves {
  position: absolute;
  top: 750px;
  right: 708px;
  margin-left: 600px;
  z-index: 3;
}

.One_leaf {
  position: absolute;
  top: 230px;
  right: 50px;
  margin-left: 600px;
  z-index: 3;
}

.about_us {
  margin-top: 418px;
}

.Jugs-container {
  overflow: hidden;
  padding-left: 286px;
  position: absolute;
}

.Jugs {
  height: 557px;
  width: 683px;
}

.Leaf_to_the_left {
  position: absolute;
  left: 230px;
  top: 298px;
  z-index: 3;
}

.Leaf_to_the_right {
  position: absolute;
  left: 360px;
  top: 460px;
  z-index: 3;
}

h2 {
  font-family: var(--font-family);
  font-weight: 700;
  font-size: 45px;
  color: #000;
  white-space: nowrap;
  margin-left: 15px;
}

.about_us-Jugs {
  position: absolute;
}
.about_us_text-title{
  height: 50px;
  display: flex;
  align-items: center;
}
.about_us_text {
  position: absolute;
  right: 1;
  width: 150px;
  padding-left: 1090px;
  top: 0;
}
.about_us_text_p{
  font-weight: 700;
color: rgba(0, 0, 0, 0.5);

}
.green-color{
  font-weight: 700;
font-size: 16px;
color: #1e6140;
}
.about_us_text_container{
  width: 520px;
  font-family: var(--font-family);
}
</style>
