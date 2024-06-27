<template>
  <div>
    <div class="add-title-container">
      <h2 class="add-title">
        <img :src="Xz" alt="" class="xz"> Зміна паролю <img :src="Xz_2" alt="" class="xz">
      </h2>
    </div>
    <div class="add-goods-form">
      <form @submit.prevent="changePassword" enctype="multipart/form-data">
        <div class="form-group">
          <label for="currentPassword">Поточний пароль:</label>
          <input type="password" id="currentPassword" v-model="currentPassword" required class="in_info" />
        </div>
        <div class="form-group">
          <label for="newPassword">Новий пароль:</label>
          <input type="password" id="newPassword" v-model="newPassword" required class="in_info" />
        </div>
        <div class="form-group">
          <label for="confirmPassword">Підтвердження нового паролю:</label>
          <input type="password" id="confirmPassword" v-model="confirmPassword" required class="in_info" />
        </div>
        <button type="submit" class="submit">Змінити пароль</button>
        <div v-if="message" :class="{ 'success-message': success, 'error-message': !success }" class="message">
          {{ message }}
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import Xz from "@/assets/xz.svg";
import Xz_2 from "@/assets/xz_2.svg";
export default {
  data() {
    return {
      Xz_2,
      Xz,
      currentPassword: '',
      newPassword: '',
      confirmPassword: '',
      success: false,
      message: ''
    };
  },
  methods: {
    changePassword() {
      const token = localStorage.getItem('token'); // Отримання токена з localStorage
      const userId = localStorage.getItem('user_id'); // Отримання user_id з localStorage

      if (!token || !userId) {
        console.error('Токен або user_id не знайдено.');
        return;
      }

      const formData = new FormData();
      formData.append('currentPassword', this.currentPassword);
      formData.append('newPassword', this.newPassword);
      formData.append('confirmPassword', this.confirmPassword);
      formData.append('user_id', userId);

      axios.post('http://localhost/agrar_shop/Backend/update_password.php', formData)
        .then(response => {
          this.success = response.data.success;
          this.message = response.data.message;
          if (this.success) {
            this.currentPassword = '';
            this.newPassword = '';
            this.confirmPassword = '';
          }
        })
        .catch(error => {
          console.error('Помилка зміни паролю:', error);
          this.message = 'Під час зміни паролю виникла помилка.';
        });
    }
  }
};
</script>

<style scoped>
.add-title-container {
  margin-top: -30px;
}

.add-title {
  font-weight: 700;
  font-size: 45px;
  color: #000;
  font-family: var(--font-family);
  text-align: center;
  margin-bottom: 40px;
  margin-bottom: 10px;
}

.add-goods-form {
  max-width: 300px;
  margin: 0 auto;
  padding-bottom: 60px;
}

.form-group {
  margin-bottom: 15px;
}

.in_info {
  width: 100%;
  padding: 10px 15px;
  box-sizing: border-box;
  border-radius: 20px;
  border: 1px solid #ccc;
}

.submit {
  padding: 10px 15px;
  background-color: #E74E13;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 20px;
  width: 100%;
}

.submit:hover {
  background-color: #8C3213;
}

.message {
  margin-top: 10px;
  text-align: center;
}

.success-message {
  color: green;
}

.error-message {
  color: red;
}
</style>
