<template>
    <section class="Log">
      <div class="Log_info">
        <div class="Log-title-container">
          <h2 class="Log-title">
            <img :src="Xz" alt="" class="xz"> Вхід <img :src="Xz_2" alt="" class="xz">
          </h2>
        </div>
        <p class="Log_info_text">Увійдіть, щоб використовувати всі можливості особистого кабінету: відстеження замовлень, налаштування передплати, зв'язки з соціальними мережами та інші. Ми ніколи і за жодних умов не розголошуємо особисті дані клієнтів. Контактна інформація буде використана тільки для оформлення замовлень та зручнішої роботи з сайтом</p>
        <div class="login-form">
          <form @submit.prevent="login">
            <div class="form-group">
              <input type="text" id="contact" v-model="contact" placeholder="Телефон або E-mail" required class="in_info" />
            </div>
            <div class="form-group">
              <input type="password" id="password" v-model="password" placeholder="Пароль" required class="in_info" />
            </div>
            <div class="form-group-label">
              <label>
                <input type="checkbox" v-model="agreedToTerms" required class="checkbox" />
                Я згоден на обробку і захист<a href="" class="checkbox_link">персональних даних</a>
              </label>
            </div>
            <button class="submit" type="submit">Вхід</button>
          </form>
        </div>
      </div>
    </section>
  </template>
  
  <script>
  import axios from 'axios';
  import Xz from "@/assets/xz.svg";
  import Xz_2 from "@/assets/xz_2.svg";
  
  export default {
    data() {
      return {
        Xz,
        Xz_2,
        contact: '',
        password: '',
        agreedToTerms: false
      };
    },
    methods: {
      login() {
        const formData = new FormData();
        formData.append('contact', this.contact);
        formData.append('password', this.password);
        formData.append('agreedToTerms', this.agreedToTerms ? 1 : 0);
  
        axios.post('http://localhost/agrar_shop/Backend/login.php', formData)
          .then(response => {
            alert(response.data.message);
  
            if (response.data.success) {
              localStorage.setItem('token', response.data.token);
              localStorage.setItem('user_id', response.data.user_id); // Збереження user_id в localStorage
              localStorage.setItem('loginTime', Date.now());
  
              // Очистка полів форми після входу
              this.contact = '';
              this.password = '';
              this.agreedToTerms = false;
  
              // Перенаправлення на сторінку відповідно до ролі користувача
              if (response.data.role_id === 1) {
                this.$router.push({ name: 'ProfileAdmin' });
              } else {
                this.$router.push({ name: 'Profile' });
              }
            }
          })
          .catch(error => {
            console.error("Під час виконання запиту виникла помилка:", error);
          });
      }
    }
  };
  </script>
  
  <style>
  .Log {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: -275px;
  }
  
  .Log-title-container {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .Log-title {
    margin-top: 40px;
    font-weight: 700;
    font-size: 45px;
    color: #000;
    font-family: var(--font-family);
    text-align: center;
    width: 100%;
    margin-bottom: 40px;
    margin-bottom: 10px;
  }
  
  .login-form {
    max-width: 400px;
    margin: 0 auto;
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
    width: 400px;
  }
  
  .submit:hover {
    background-color: #8C3213;
  }
  
  .Log_info_text {
    width: 800px;
    height: 70px;
    text-align: center;
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
  </style>
  