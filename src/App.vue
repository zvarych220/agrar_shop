<template>
  <div id="app">
    <Menu />
    <section>
      <img class="red-image" :src="Red" alt="Red overlay image">
      <div class="agricultural-online-store">
        
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
        
      </div>
      
    </section>
  </div>
</template>

<script>
import Menu from './components/Menu.vue';
import PhotoIndex from './assets/photo-index.png';
import Red from './assets/red.png';
import Work_man from './assets/work-man.png';
import Xz from './assets/xz.svg';
import About_the_company from './components/index-buttone/About_the_company.vue';


export default {
  components: {
    Menu,
    About_the_company,
  },
  data() {
    return {
      PhotoIndex,
      Red,
      Work_man,
      Xz,
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
  margin-top: -145px;

  min-height: 100vh;

  max-width: 1270px;
  z-index: -10;
  overflow-x: hidden;
  content: "";
  position: absolute;

  background-image: url('./assets/photo-index.png');
  background-size: cover;
  z-index: -10;
}

.agricultural-online-store::before {
  
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
  margin-left: 13px;
  width: 605px;
  height: 262px;
}

.index-elements-xz {
  height: 35px;
  width: 25px;
  margin-right: 10px;
}

.index-elements-h1 {
  display: flex;
  align-items: center;
  margin-top: 385px;
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
}
</style>
