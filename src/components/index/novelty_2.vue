<template>
  <section class="product">
    <div class="section-product">
      <button class="btn-left" @click="previous" @mouseover="leftImage = left_hover" @mouseleave="leftImage = left">
        <img :src="leftImage" alt="Left Arrow" />
      </button>
      <div class="product-list">
        <h2 class="product-title">
          <img :src="Xz" alt="Xz" /> Акції <img :src="Xz_2" alt="Xz_2" />
        </h2>
        <div v-for="product in visibleProducts" :key="product.id" class="product-container">
          <img :src="product.image" alt="" class="product-container-img" />
          <div class="product-container-info">
            <h3 class="product-container-info-title">
              {{ product.title }}
            </h3>
            <p class="product-container-info-In-stock">
              {{ product.inStock }}
            </p>
            <div class="product-container-info-In">
              <div class="product-container-info-detailing">
                <p class="price">
                  <span v-if="product.discount > 0" class="discounted-price">
                    {{ calculateDiscountedPrice(product.price, product.discount) }} грн
                  </span>
                  <span v-else>
                    {{ product.price }} грн
                  </span>
                </p>
               
              </div>
              <Shop />
            </div>
          </div>
        </div>
      </div>
      <button class="btn-right" @click="next" @mouseover="rightImage = right_hover" @mouseleave="rightImage = right">
        <img :src="rightImage" alt="Right Arrow" />
      </button>
    </div>
  </section>
</template>

<script>
import axios from 'axios';
import left from "@/assets/slider/left.svg";
import right from "@/assets/slider/right.svg";
import left_hover from "@/assets/slider/left-hover.svg";
import right_hover from "@/assets/slider/right-hover.svg";

import Xz from "@/assets/xz.svg";
import Xz_2 from "@/assets/xz_2.svg";
import Shop from "@/components/index/Shop.vue";

export default {
  components: {
    Shop,
  },
  data() {
    return {
      Xz,
      Xz_2,
      left,
      right,
      left_hover,
      right_hover,
      leftImage: left,
      rightImage: right,
      currentIndex: 0,
      products: [],
    };
  },
  computed: {
    visibleProducts() {
      return this.products.slice(this.currentIndex, this.currentIndex + 4);
    },
  },
  methods: {
    next() {
      if (this.currentIndex + 4 < this.products.length) {
        this.currentIndex++;
      }
    },
    previous() {
      if (this.currentIndex > 0) {
        this.currentIndex--;
      }
    },
    fetchProducts() {
      axios.get('http://localhost/agrar_shop/Backend/fetch_action_goods.php')
        .then(response => {
          this.products = response.data;
        })
        .catch(error => {
          console.error('Помилка отримання даних:', error);
        });
    },
    calculateDiscountedPrice(price, discount) {
      if (discount > 0) {
        return (price * (100 - discount) / 100).toFixed(2);
      } else {
        return price.toFixed(2);
      }
    },
  },
  mounted() {
    this.fetchProducts();
  },
};
</script>

<style scoped>
.product {
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: url('@/assets/bg.png'); 
  background-size: cover; 
  background-position: center;
  padding-bottom: 50px;
}

:root {
  --font-family: "Montserrat", sans-serif;
  --second-family: "Roboto", sans-serif;
}

.product-title {
  margin-top: 40px;
  font-weight: 700;
  font-size: 45px;
  color: #fff;
  font-family: var(--font-family);
  text-align: center;
  width: 100%;
  margin-bottom: 40px;
}

.section-product {
  display: flex;
  align-items: center;
  gap: 20px;
  position: relative; 
}

.product-list {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center; 
  align-items: center; 
}

.product-container {
  border-radius: 20px;
  width: 255px;
  height: 355px;
  background: #fff;
  margin-top: -20px;
}

.product-container-info {
  margin-left: 10px;
  margin-top: -15px;
  border-radius: 20px;
  width: 235px;
  height: 150px;
  background: rgba(140, 50, 19, 0.06);
}

.product-container-img {
  margin: 30px 79px;
  width: 97px;
  height: 132px;
}

.product-container-info-title {
  font-weight: 600;
  font-size: 16px;
  color: #000;
  font-family: var(--font-family);
  padding-top: 20px;
  padding-left: 20px;
  margin-bottom: 0;
}

.product-container-info-In-stock {
  font-weight: 400;
  font-size: 14px;
  color: #1e6140;
  font-family: var(--font-family);
  padding-top: 3px;
  padding-left: 20px;
  margin: 0;
}

.product-container-info-In {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 20px 0 20px;
}

.price {
  font-weight: 700;
  font-size: 18px;
  color: #84be51;
  font-family: var(--font-family);
  margin-bottom: 0;
  margin-top: 20px;
}

.discounted-price {
  text-decoration: line-through;
  color: #999;
}

.number {
  font-weight: 400;
  font-size: 14px;
  color: #000;
  font-family: var(--font-family);
  margin: 0;
}

.btn-right,
.btn-left {
  border: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  background-color: rgba(0, 0, 0, 0);
  position: absolute; 
  top: 50%; 
  transform: translateY(-50%); 
}

.btn-left {
  left: -35px; 
}

.btn-right {
  right: -35px; 
}
</style>
