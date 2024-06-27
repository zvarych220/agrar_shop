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
import Footer from '@/components/footer.vue'; // Змінено назву файла
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
      currentToken: '',
      userId: ''
    };
  },
  created() {
    this.fetchUserData();
    this.fetchProductsInCart();
    this.currentToken = localStorage.getItem('token');
    this.userId = localStorage.getItem('user_id');
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
      if (!this.currentToken || !this.userId) {
        alert('Токен або ідентифікатор користувача не знайдено. Будь ласка, увійдіть в систему знову.');
        this.$router.push({ name: 'Login' });
        return;
      }

      const purchaseData = {
        token: this.currentToken,
        user_id: this.userId,
        name: this.userData.name,
        surname: this.userData.surname,
        phone: this.userData.phone,
        email: this.userData.email,
        address: this.userData.address,
        total_amount: this.calculateTotalAmount(),
        products: this.products.map(product => ({
          good_id: product.id,
          quantity: product.quantity,
          price: product.price
        }))
      };

      axios.post('http://localhost/agrar_shop/Backend/savePurchase.php', purchaseData, {
        withCredentials: true
      })
      .then(response => {
        if (response.data.success) {
          alert('Дані користувача та замовлення успішно збережені!');
          localStorage.removeItem('shoppingCart');
          this.products = []; // Очищуємо кошик
        } else {
          alert('Помилка: ' + response.data.message);
        }
      })
      .catch(error => {
        console.error('Помилка збереження даних:', error);
        alert('Помилка збереження даних користувача та замовлення.');
      });
    },
    calculateTotalAmount() {
      return this.products.reduce((total, product) => total + (product.quantity * product.price), 0);
    }
  }
};
</script>

<style scoped>
.main-container {
  margin: 0 auto;

}

.user-data-container {
  background-color: #f5f5f5;
  padding: 20px;
  border-radius: 5px;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

label {
  font-weight: bold;
}

input {
  width: 300px;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

button {
  width: 300px;
  background-color: #4CAF50;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

.product-item {
  display: flex;
  margin-bottom: 20px;
  border-bottom: 1px solid #ddd;
  padding-bottom: 20px;
}

.product-image {
  width: 100px;
  height: 100px;
  object-fit: cover;
  margin-right: 20px;
}

.product-details {
  flex-grow: 1;
}

h2 {
  color: #333;
  margin-bottom: 15px;
}

h3 {
  margin: 0 0 10px 0;
}

p {
  margin: 5px 0;
}

.add-title-container {
  margin-top: -350px;
}

.add-title {
  font-weight: 700;
  font-size: 45px;
  color: #000;
  font-family: var(--font-family);
  text-align: center;
  margin-bottom: 40px;
}

.add-goods-form {
  max-width: 400px;
  margin: 0 auto;
  padding-bottom: 60px;
}

.form-group {
  margin-bottom: 15px;
}

.in_info {
  width: 100px;
  padding: 10px 15px;
  box-sizing: border-box;
  border-radius: 4px;
  border: 1px solid #ddd;
}

.file-input {
  display: none;
}

.custom-file-button {
  padding: 10px 15px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 4px;
}

.custom-file-button:hover {
  background-color: #45a049;
}

.file-name {
  margin-left: 10px;
}

.submit {
  padding: 10px 15px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 4px;
  width: 100%;
}

.submit:hover {
  background-color: #45a049;
}

form label {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}

.checkbox_link {
  text-decoration: none;
  color: #84C551;
}
.user-data-container{
  margin-left: 600px;
  margin-top: -200px;
  width: 700px;
}
</style>
