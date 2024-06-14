<template>
  <section class="index">
    
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
</template>

<script>
import PhotoIndex from '@/assets/photo-index.png';
import Red from '@/assets/red.png';
import WorkMan from '@/assets/work-man.png';
import Xz from '@/assets/xz.svg';
import About_the_company from '@/components/index/About_the_company.vue';
import Two_leaves from '@/assets/two_leaves.png';
import One_leaf from '@/assets/one_leaf.png';

export default {
  components: {
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

<style scoped>
.section {
  margin: 0 auto;
  max-width: 1277px;
}

.agricultural-online-store {
  margin-top: -420px;
  height: 1000px;
  width: 1281px;
  background-image: url('@/assets/photo-index.png');
  background-size: cover;
  position: relative;
  z-index: -1;
}

.red-image {
  height: 580px;
  width: 580px;
  top: -172px;
  right: -250px;
  z-index: 1;
  position: relative;
}

.index-elements {
  margin-top: -650px;
  height: 350px;
  overflow: hidden;
  text-align: left;
  margin-left: 100px;
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
  overflow: visible;
  position: relative;
  margin-top: -390px;
  margin-left: 1110px;
  width: 800px; 
  height: 690px; 
}

.WorkMan {
  width: 100%;
  height: 100%;
  position: relative;
  top: 0;
  right: 0;
  z-index: 1;
}

.Two_leaves {
  position: absolute;
  top: 60%; 
  left: -150px; 
  z-index: 3;
}

.One_leaf {
  position: absolute;
  top: -17%; 
  right: 100px; 
  z-index: 3;
}
</style>
