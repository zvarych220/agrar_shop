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
  </div>
</template>

<script>
import Menu from './components/Menu.vue';
import PhotoIndex from './assets/photo-index.png';
import Red from './assets/red.png';
import WorkMan from './assets/work-man.png';
import Xz from './assets/xz.svg';
import About_the_company from './components/index-buttone/About_the_company.vue';
import Two_leaves from './assets/two_leaves.png';
import One_leaf from './assets/one_leaf.png';

export default {
  components: {
    Menu,
    About_the_company,
  },
  data() {
    return {
      PhotoIndex,
      Red,
      WorkMan,
      Xz,
      Two_leaves,
      One_leaf,
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
  margin-left: 404px;
  margin-right: 422px;
}

.agricultural-online-store {
  height: 1000px;
  width: 1277px;
  margin-top: -180px;
  z-index: -10;
  overflow-x: hidden;
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
</style>
