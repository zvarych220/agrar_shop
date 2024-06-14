<template>
    <section class="product">
      <div class="section-product">
        <button class="btn-left" @click="previous" @mouseover="leftImage = left_hover" @mouseleave="leftImage = left">
          <img :src="leftImage" alt="Left Arrow" />
        </button>
        <div class="product-list">
          <h2 class="product-title">
            <img :src="Xz" alt="Xz" /> Новинки <img :src="Xz_2" alt="Xz_2" />
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
                  <p class="price">{{ product.price }} грн</p>
                  <p class="number">{{ product.quantity }} шт</p>
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
  import left from "@/assets/slider/left.svg";
  import right from "@/assets/slider/right.svg";
  import left_hover from "@/assets/slider/left-hover.svg";
  import right_hover from "@/assets/slider/right-hover.svg";
  
  import Petunia_Sophistica_F1 from "@/assets/slider/Petunia_Sophistica_F1.png";
  import Petunia_Sophistica from "@/assets/slider/Petunia_Sophistica.png";
  import speed_2 from "@/assets/slider/speed_2.png";
  import speed from "@/assets/slider/speed.png";
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
        products: [
          { id: 1, image: Petunia_Sophistica, title: "Петунія Софістика F1", inStock: "В наявності", price: 20, quantity: 1 },
          { id: 2, image: speed, title: "Скор 250 ЕС к.э.", inStock: "В наявності", price: 589, quantity: 1 },
          { id: 3, image: speed_2, title: "Скор 250 ЕС к.э.", inStock: "В наявності", price: 200, quantity: 1 },
          { id: 4, image: Petunia_Sophistica_F1, title: "Петунія Софістика F1", inStock: "В наявності", price: 20, quantity: 1 },
          { id: 5, image: Petunia_Sophistica, title: "Петунія Софістика F1", inStock: "В наявності", price: 20, quantity: 1 },
          { id: 6, image: speed, title: "Скор 250 ЕС к.э.", inStock: "В наявності", price: 589, quantity: 1 },
          { id: 7, image: speed_2, title: "Скор 250 ЕС к.э.", inStock: "В наявності", price: 200, quantity: 1 },
        ],
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
    },
  };
  </script>
  
  <style scoped>
  .product {
    margin-top: 1000px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #F8F8F8;
    margin-bottom: 120px;
  }
  
  :root {
    --font-family: "Montserrat", sans-serif;
    --second-family: "Roboto", sans-serif;
  }
  
  .product-title {
    font-weight: 700;
    font-size: 45px;
    color: #000;
    font-family: var(--font-family);
    text-align: center;
    width: 100%;
    margin-bottom: 40px;
  }
  
  .section-product {
    display: flex;
    align-items: center;
    gap: 20px;
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
  }
  </style>
  