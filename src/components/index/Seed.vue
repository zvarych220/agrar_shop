<template>
  <section class="seed">
    <div class="seed-container">
      <div class="section">
        <div class="seed-container-title">
          <h2 class="product-title">
            <img :src="Xz" alt="Xz" /> Насіння
          </h2>
        </div>
        <div class="seed-container-info">
          
            <p>Вирощування овочів, квітів на своїй ділянці або просто на балконі - це улюблене заняття багатьох дачників та
            городників. Звичайно, свіжі овочі з власного городу натуральні, смачні та корисні. Але щоб отримати хороший
            урожай томату або капусти, насолоджуватися цвітінням петунії або троянди, важливо не тільки правильно
            доглядати за рослинами. Все починається із вибору посівного матеріалу. І тут постає питання: яке насіння
            вибрати? Адже вони мають бути якісними, давати гарну схожість.</p>

            <p>Предлагаем покупателям широкий выбор семян овощей. У нас вы можете найти семена баклажан, разных видов
            капусты, бобовых и бахчевых культур, томата, перца, огурцов, лука, салата, чеснока, картофеля от
            отечественных и зарубежных производителей.</p>

            <p>Также вы можете найти в нашем каталоге семена цветов: однолетних (петуния, львиный зев, календула и т.д.),
            двулетних (виола, примула, мальва), многолетних (иберис, анемона, гибискус, дельфиниум, фрезия), луковичных
            (тюльпаны, лилия, ирис, нарциссы), комнатных (гербера, бегония, кактус, мимоза, пасифлора). Конечно, это
            далеко не весь список — каждая хозяйка найдет здесь свой любимый цветок.</p>

            <p>В широком ассортименте представлены саженцы плодовых деревьев, роз, ягодных кустов. У нас вы можете купить
            семена газонной травы, а также сопутствующие товары: удобрения, средства защиты, биопрепараты, садовый
            инвентарь, субстраты, грунты, агроволокно, горшки, кассеты для рассады.
          </p>
        </div>
      </div>
    </div>

  </section>
</template>

<script>
import Xz from "@/assets/xz.svg";
import Bg_2 from "@/assets/bg_2.png";
export default {

  data() {
    return {
      Xz,
      Bg_2,
    };
  }
};
</script>

<style scoped>

:root {
  --font-family: "Montserrat", sans-serif;
  --second-family: "Roboto", sans-serif;
}

.section {
  margin-left: 425px;
  margin-right: 425px;
}
.seed-container{
  background-image: url(@/assets/bg_2.png); 
  background-size: cover; 
  background-position: center; 
}
.product-title {
 padding-top: 50px;
  color: rgb(255, 255, 255);
  font-family: '--font-family';
  font-size: 45px;
  font-weight: 700;
  line-height: 55px;
  letter-spacing: 0%;
  text-align: left;
}
.seed-container-info{
  padding-bottom: 50px;
  color: rgb(255, 255, 255);
font-family: '--font-family';
font-size: 16px;
font-weight: 400;
line-height: 20px;
letter-spacing: 0%;
text-align: left;
}
</style>