<template>
    <div class="main-container">
      <Menu />
      <div class="prod_viev">
        <div class="filter">
        <FilterComponent />
      </div>
        <div class="product-list">
          <div class="product-row" v-for="(row, index) in numberOfRows" :key="index">
            <div v-for="(product, rowIndex) in productsInRow(index)" :key="rowIndex" class="product-container">
              <img :src="product.image" alt="" class="product-container-img" />
              <div class="product-container-info">
                <h3 class="product-container-info-title">{{ product.title }}</h3>
                <p class="product-container-info-In-stock">{{ product.inStock }}</p>
                <div class="product-container-info-In">
                  <div class="product-container-info-detailing">
                    <p class="price">{{ product.price }} грн</p>
                    
                  </div>
                  <Shop />
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <Footer />
    </div>
  </template>
  
  <script>
  import axios from 'axios';  
  
  import Menu from '@/components/Menu.vue';
  import Footer from '@/components/footer.vue';
  import FilterComponent from '@/components/goods/filter.vue';
  import Shop from "@/components/index/Shop.vue";
  
  export default {
    components: {
      Menu,
      Footer,
      FilterComponent,
      Shop
    },
    data() {
      return {
        products: [],  // Initialize products as an empty array
        currentIndex: 0  // Assuming you have currentIndex defined elsewhere
      };
    },
    computed: {
      // Calculate number of rows needed based on products length and items per row
      numberOfRows() {
        return Math.ceil(this.products.length / 3);
      }
    },
    created() {
      this.fetchData();
    },
    methods: {
      fetchData() {
        axios.get('http://localhost/agrar_shop/Backend/products-Ins.php')
          .then(response => {
            this.products = response.data;
          })
          .catch(error => {
            console.error("Сталася помилка при отриманні даних!", error);
          });
      },
      // Method to get products for a specific row
      productsInRow(rowIndex) {
        const start = rowIndex * 3;
        return this.products.slice(start, start + 3);
      }
    }
  }
  </script>
  
  <style scoped>
  
  .product {
    margin-top: 700px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #F8F8F8;
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
    position: relative;
  }
  .filter {
    z-index: 10;
    position: relative; /* Ви можете встановити position: relative; для кращого контролю */
  }
  
  .product-list {
    z-index: 5; /* Зменште значення з-index для product-list, якщо filter все ще перекривається */
    position: relative; /* Можливо, встановіть position: relative; */
    margin-top: -90px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    align-items: center;
    padding-bottom: 40px;
  }
  
  .product-row {
  
    margin-left: 100px;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Adjust alignment as needed */
    width: 100%;
    gap: 20px; /* Adjust gap between rows */
  }
  
  .product-container {
    border-radius: 20px;
    width: 255px;
    height: 355px;
    background: #f1f1f1;
    margin-bottom: 20px; /* Equal space at the bottom */
    margin-right: 20px; /* Equal space on the right */
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
    margin: 30px auto; /* Center image horizontally */
    width: 97px;
    height: 132px;
    display: block; /* Ensure image is centered properly */
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
  </style>
  