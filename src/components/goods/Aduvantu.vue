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
                <button @click="handleShopClick(product)" class="shop-button">
                  <img :src="currentImage(product)" alt="Shop button" @mouseover="toggleHover(product, true)" @mouseleave="toggleHover(product, false)" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Footer />
    <div v-if="message" class="message">{{ message }}</div>
    <div v-if="showPopup" class="popup">
      <div class="popup-content">
        <span class="close" @click="closePopup">&times;</span>
        <h3>{{ popupProduct.title }}</h3>
        <img :src="popupProduct.image" alt="Product Image" class="popup-image" />
        <p>Ціна: {{ popupProduct.price }} грн</p>
        <p>В наявності: {{ popupProduct.inStock }}</p>
        <div class="popup-buttons">
          <button @click="continueShopping" class="continue-shopping-btn">Продовжити покупки</button>
          <button @click="finalizeOrder(popupProduct)" class="finalize-order-btn">Оформити замовлення</button>
        </div>
        <div class="quantity">
          <label for="quantity">Кількість:</label>
          <input type="number" id="quantity" v-model="popupProduct.quantity" min="1">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';  
import Menu from '@/components/Menu.vue';
import Footer from '@/components/footer.vue';
import FilterComponent from '@/components/goods/filter.vue';
import Shop from "@/components/index/Shop.vue";

import ShopImage from "@/assets/shop.svg";
import ShopHoverImage from "@/assets/shop-hover.svg";

export default {
  components: {
    Menu,
    Footer,
    FilterComponent,
    Shop
  },
  data() {
    return {
      products: [],
      currentIndex: 0,
      ShopImage: ShopImage,
      ShopHoverImage: ShopHoverImage,
      message: '',
      showPopup: false,
      popupProduct: {}, // Додано стан для відображення вікна з деталями продукту
      shoppingCart: [],  // Додано стан для кошика покупок
      isAuthenticated: false  // Додано стан для перевірки автентифікації
    };
  },
  computed: {
    numberOfRows() {
      return Math.ceil(this.products.length / 3);
    }
  },
  created() {
    this.fetchData();
    this.checkAuthentication();
    this.loadShoppingCart(); // Завантажити кошик із локального сховища при ініціалізації
  },
  methods: {
    fetchData() {
      axios.get('http://localhost/agrar_shop/Backend/products-Adu.php')
        .then(response => {
          this.products = response.data;
        })
        .catch(error => {
          console.error("Сталася помилка при отриманні даних!", error);
        });
    },
    checkAuthentication() {
      const token = localStorage.getItem('token');
      this.isAuthenticated = !!token;
    },
    loadShoppingCart() {
      const storedCart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
      this.shoppingCart = storedCart;
    },
    productsInRow(rowIndex) {
      const start = rowIndex * 3;
      return this.products.slice(start, start + 3);
    },
    handleShopClick(product) {
      this.popupProduct = { ...product, quantity: 1 };
      this.showPopup = true;
    },
    toggleHover(product, isHovered) {
      product.hovered = isHovered;
    },
    currentImage(product) {
      return product.hovered ? this.ShopHoverImage : this.ShopImage;
    },
    closePopup() {
      this.showPopup = false;
    },
    finalizeOrder(product) {
      if (this.isAuthenticated) {
        this.addToCart(product);
        this.$router.push('/shopping_cart');
      } else {
        alert('Ви не автентифіковані. Будь ласка, увійдіть для продовження оформлення замовлення.');
      }
      this.message = `Замовлено ${product.quantity} одиниць товару: ${product.title}`;
      setTimeout(() => {
        this.message = '';
        this.showPopup = false;
      }, 3000);
    },
    continueShopping() {
      this.addToCart(this.popupProduct);
      this.showPopup = false;
    },
    addToCart(product) {
      const cartItem = this.shoppingCart.find(item => item.id === product.id);
      if (cartItem) {
        cartItem.quantity += product.quantity;
      } else {
        this.shoppingCart.push({ ...product });
      }
      localStorage.setItem('shoppingCart', JSON.stringify(this.shoppingCart));
      console.log("Shopping Cart:", this.shoppingCart); // Log the updated shopping cart to the console
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
  position: relative;
}

.product-list {
  z-index: 5;
  position: relative;
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
  align-items: flex-start;
  width: 100%;
  gap: 20px;
}

.product-container {
  border-radius: 20px;
  width: 255px;
  height: 355px;
  background: #f1f1f1;
  margin-bottom: 20px;
  margin-right: 20px;
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
  margin: 30px auto;
  width: 97px;
  height: 132px;
  display: block;
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

.shop-button {
  margin-left: 15px;
  margin-top: 13px;
  padding: 0;
  background-color: rgba(0, 0, 0, 0);
  border: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}

.popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  z-index: 1000;
}

.popup-content {
  text-align: center;
}

.popup-image {
  max-width: 100%;
  height: auto;
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
  font-size: 20px;
}

.popup-buttons {
  margin-top: 20px;
}

.continue-shopping-btn,
.finalize-order-btn {
  padding: 10px 20px;
  margin: 0 10px;
  font-size: 14px;
  cursor: pointer;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  outline: none;
}

.quantity {
  margin-top: 20px;
}

.quantity label {
  font-weight: bold;
}

.quantity input {
  width: 50px;
  padding: 5px;
  font-size: 14px;
  text-align: center;
  border: 1px solid #ccc;
  border-radius: 5px;
  outline: none;
}
</style>
