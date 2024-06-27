<template>
  <div class="main-container">
    <Menu />
    <div class="user-data-container">
      <h2>Інформація про користувача</h2>
      <form @submit.prevent="handleSubmit">
        <div>
          <label for="name">Ім'я:</label>
          <input type="text" v-model="userData.name" id="name" required />
        </div>
        <div>
          <label for="surname">Прізвище:</label>
          <input type="text" v-model="userData.surname" id="surname" required />
        </div>
        <div>
          <label for="phone">Телефон:</label>
          <input type="tel" v-model="userData.phone" id="phone" required />
        </div>
        <div>
          <label for="email">Email:</label>
          <input type="email" v-model="userData.email" id="email" required />
        </div>
        <div>
          <label for="address">Адреса доставки:</label>
          <input type="text" v-model="userData.address" id="address" required />
        </div>
        <button type="submit">Зберегти</button>
      </form>
      <h2>Товари в кошику</h2>
      <div v-if="products.length === 0">
        <p>Кошик порожній.</p>
      </div>
      <div v-else>
        <div v-for="(product, index) in products" :key="index" class="product-item">
          <img :src="product.image" alt="Зображення товару" class="product-image" />
          <div class="product-details">
            <h3>{{ product.title }}</h3>
            <p>Ціна: {{ product.price }} грн</p>
            <p>Кількість: {{ product.quantity }}</p>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Menu from '@/components/Menu.vue';
import Footer from '@/components/footer.vue';
import axios from 'axios';

export default {
  components: {
    Menu,
    Footer
  },
  data() {
    return {
      userData: {
        name: '',
        surname: '',
        phone: '',
        email: '',
        address: ''
      },
      products: [],
      currentToken: ''
    };
  },
  created() {
    this.fetchUserData();
    this.fetchProductsInCart();
    this.currentToken = localStorage.getItem('token');
    console.log('Поточний токен (фронтенд):', this.currentToken);
  },
  methods: {
    fetchUserData() {
      const userData = JSON.parse(localStorage.getItem('userData'));
      if (userData) {
        this.userData = userData;
      }
    },
    fetchProductsInCart() {
      const products = JSON.parse(localStorage.getItem('shoppingCart')) || [];
      this.products = products;
    },
    handleSubmit() {
    console.log('Submitting data:', this.userData, this.products, this.currentToken);

    if (!this.currentToken) {
        alert('Токен не знайдено. Будь ласка, увійдіть в систему знову.');
        this.$router.push({ name: 'Login' });
        return;
    }

    const purchaseData = {
        token: this.currentToken,
        user_id: localStorage.getItem('user_id'),
        name: this.userData.name,
        surname: this.userData.surname,
        phone: this.userData.phone,
        email: this.userData.email,
        address: this.userData.address,
        purchase_date: new Date().toISOString(),
        total_amount: this.calculateTotalAmount(),
        products: this.products.map(product => ({
            good_id: product.id,
            quantity: product.quantity,
            price: product.price
        }))
    };

    console.log('Дані для відправки:', purchaseData);

    axios.post('http://localhost/agrar_shop/Backend/save_purchase.php', purchaseData, {
        withCredentials: true
    })
    .then(response => {
        console.log('Відповідь:', response.data);
        if (response.data.success) {
            alert('Дані користувача та замовлення успішно збережені!');
            localStorage.removeItem('shoppingCart');
            this.products = [];
        } else {
            alert('Помилка: ' + response.data.message);
        }
    })
    .catch(error => {
        console.error('Помилка збереження даних:', error);
        alert('Помилка збереження даних користувача та замовлення.');
    });
}
,

    calculateTotalAmount() {
      return this.products.reduce((total, product) => total + (product.quantity * product.price), 0);
    }
  }
};
</script>