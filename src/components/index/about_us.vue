<template>
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
</template>

<script>

import Xz from '@/assets/xz.svg';
import Jugs from '@/assets/jugs.png';
import Leaf_to_the_left from '@/assets/leaf_to_the_left.png';
import Leaf_to_the_right from '@/assets/leaf_to_the_right.png';
import About_use_btn from '@/components/index/About_use_buttone.vue'


export default {
  components: {
    About_use_btn,
},
  data() {
    return {
      Jugs,
      Leaf_to_the_left,
      Leaf_to_the_right,
      Xz,
    };
  }
};
</script>

<style>
.about_us {
  margin-top: 108px;
  
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

.about_us_text-xz{
  width: 32px;
  height: 25px;
}
</style>