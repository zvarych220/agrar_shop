<template>
  <section class="product">
    
    <div class="product-container">
      <div class="product-card" v-for="(product, index) in visibleProducts" :key="index">
        <div class="product-image">
          
          <img :src="product.image" class="product-thumb" alt="">
        </div>
        <div class="product-info">
          <h2 class="product-brand">{{ product.brand }}</h2>
          <p class="product-short-description">{{ product.description }}</p>
          <span class="price">{{ product.price }}</span><span class="actual-price">{{ product.actualPrice }}</span>
        </div>
      </div>
    </div>
    <button class="pre-btn" @click="scrollLeft"><img :src="left" alt=""></button>
    <button class="nxt-btn" @click="scrollRight"><img :src="right" alt=""></button>
  </section>
</template>

<script>
import left from '@/assets/slider/left.svg';
import right from '@/assets/slider/right.svg';

import Petunia_Sophistica_F1 from '@/assets/slider/Petunia_Sophistica_F1.png';
import Petunia_Sophistica from '@/assets/slider/Petunia_Sophistica.png';
import speed_2 from '@/assets/slider/speed_2.png';
import speed from '@/assets/slider/speed.png';

export default {
  data() {
    return {
      left,
      right,
      speed_2,
      speed, 
      Petunia_Sophistica_F1,
      Petunia_Sophistica,
      products: [
        {
          id: 1,
          image:  speed_2,
          brand: 'Скор 250 ЕС к.э.',
          description: 'Є в наявності',
          price: '200 грн',
        },
        {
          id: 2,
          image:  speed,
          brand: 'Скор 250 ЕС к.э.',
          description: 'Є в наявності',
          price: '20 грн',
        },
        {
          id: 3,
          image: Petunia_Sophistica_F1,
          brand: 'Петунія Софістика F1',
          description: 'Є в наявності',
          price: '200 грн',
        },
        {
          id: 4,
          image: Petunia_Sophistica,
          brand: 'Петунія Софістика',
          description: 'Є в наявності',
          price: '20 грн',
        },
        {
          id: 5,
          image: left,
          brand: 'Brand 2',
          description: 'Є в наявності',
          price: '$25',
        },
        {
          id: 6,
          image: right,
          brand: 'Brand 3',
          description: 'Є в наявності',
          price: '$30',
        },
      ],
      startIndex: 0,
      endIndex: 4,
    };
  },
  computed: {
    visibleProducts() {
      return this.products.slice(this.startIndex, this.endIndex);
    }
  },
  methods: {
    scrollLeft() {
      if (this.startIndex > 0) {
        this.startIndex--;
        this.endIndex--;
      }
    },
    scrollRight() {
      if (this.endIndex < this.products.length) {
        this.startIndex++;
        this.endIndex++;
      }
    }
  }
};
</script>

<style scoped>
.product {
  margin-top: 1050px;
  position: relative; /* Додали позицію relative для родительського контейнера */
}

.product-container {
  display: flex;
  overflow-x: auto;
  scroll-behavior: smooth;
  margin-right: auto; /* Змінено правий відступ на auto */
  margin-left: auto; /* Змінено лівий відступ на auto */
  max-width: calc(1423px - 70px);
  width: 100%;
  height: 520px;
  align-items: center;
  justify-content: center; /* Додано центрування по горизонталі */
  position: relative;
}

.product-card {
  flex: 0 0 calc(25% - 30px);
  margin-right: 30px;
  max-height: 520px;
  margin-bottom: auto; /* Додано, щоб картки були в центрі вертикально */
}


.pre-btn,
.nxt-btn {
  position: absolute;
  top: 50%;
  border: none;

  
  cursor: pointer;
  z-index: 8;

}

.pre-btn {
  left: 80px; /* Змінено ліве відступ */
}

.nxt-btn {
  right: 80px; /* Змінено праве відступ */
}
.pre-btn img,
.nxt-btn img {
  width: 90px; /* Збільшено ширину зображення */
  height: 90px; /* Збільшено висоту зображення */
}


.pre-btn:hover,
.nxt-btn:hover {
  opacity: 1;
}

.pre-btn img,
.nxt-btn img {
  width: 20px;
}



.product-card:hover .card-btn {
  opacity: 1;
}

.product-info {
  width: 100%;
  height: 100px;
  padding-top: 10px;
}

.product-brand {
  text-transform: uppercase;
  font-weight: 600;
font-size: 16px;
color: #000;
font-family: var(--font-family);
}

.product-short-description {
  width: 100%;
  height: 20px;
  line-height: 20px;
  overflow: hidden;
  opacity: 0.5;

  margin: 5px 0;
}

.price {
  font-weight: 900;
  font-size: 20px;
}

.actual-price {
  margin-left: 20px;
  opacity: 0.5;
  text-decoration: line-through;
}

@media (max-width: 992px) {
  .product-card {
    flex: 0 0 calc(33.33% - 30px);
  }
}

@media (max-width: 768px) {
  .product-card {
    flex: 0 0 calc(50% - 30px);
  }
}

@media (max-width: 576px) {
  .product-card {
    flex: 0 0 calc(100% - 30px);
  }
}

</style>
