<template>
    <section class="Reg">
        <div class="Reg_info">
            <div class="Reg-title-container">
                <h2 class="Reg-title">
                    <img :src="Xz" alt="" class="xz"> Реєстрація <img :src="Xz_2" alt="" class="xz">
                </h2>
            </div>
            <p class="Reg_info_text">Увійдіть, щоб використовувати всі можливості особистого кабінету: відстеження
                замовлень, налаштування
                передплати, зв'язки з соціальними мережами та інші. Ми ніколи і за жодних умов не розголошуємо
                особисті дані клієнтів. Контактна інформація буде використана тільки для оформлення замовлень та
                зручнішої роботи з сайтом</p>
            <div class="registration-form">
                <form @submit.prevent="register">
                    <div class="personal_info">
                        <div class="form-group">
                            <input type="text" id="firstName" v-model="firstName" placeholder="Ім’я" required
                                class="in_info" />
                        </div>

                        <div class="form-group">
                            <input type="text" id="lastName" v-model="lastName" placeholder="Прізвище" required
                                class="in_info" />
                        </div>
                    </div>
                    <div class="personal_info">
                        <div class="form-group">
                            <input type="tel" id="phone" v-model="phone" placeholder="Телефон" required
                                class="in_info" />
                        </div>

                        <div class="form-group">
                            <input type="email" id="email" v-model="email" placeholder="E-mail" required
                                class="in_info" />
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" v-model="password" placeholder="Пароль" required
                            class="in_info" />
                    </div>

                    <div class="form-group">
                        <input type="password" id="confirmPassword" v-model="confirmPassword"
                            placeholder="Підтвердити пароль" required class="in_info" />
                    </div>
                    <div class="form-group-label">
                        <label>
                            <input type="checkbox" v-model="agreedToTerms" required class="checkbox" />
                            Я згоден на обробку і захист<a href="" class="checkbox_link">персональних даних</a>
                        </label>
                    </div>
                    <button class="submit" type="submit">Зареєструватися</button>

                    <div class="are_you_registered">
                        <p class="login">Ви зареєстровані? Тоді <a href="" class="login_link"
                                @click.prevent="navigateToLogin">ввійдіть в свій профіль</a></p>
                    </div>
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
        Xz_2,
        Xz,
      firstName: '',
      lastName: '',
      phone: '',
      email: '',
      password: '',
      confirmPassword: '',
      agreedToTerms: false
    };
  },
  methods: {
    navigateToLogin() {
      this.$router.push({ name: 'Login' });
    },
    register() {
      if (this.password !== this.confirmPassword) {
        alert("Паролі не співпадають");
        return;
      }

      const formData = new FormData();
      formData.append('firstName', this.firstName);
      formData.append('lastName', this.lastName);
      formData.append('phone', this.phone);
      formData.append('email', this.email);
      formData.append('password', this.password);
      formData.append('confirmPassword', this.confirmPassword);
      formData.append('agreedToTerms', this.agreedToTerms ? 1 : 0);

      axios.post('http://localhost/agrar_shop/Backend/register.php', formData)
        .then(response => {
          alert(response.data.message); 
          if (response.data.success) {
            localStorage.setItem('token', response.data.token);
            localStorage.setItem('role', response.data.role_id);
            localStorage.setItem('loginTime', Date.now());

            this.firstName = '';
            this.lastName = '';
            this.phone = '';
            this.email = '';
            this.password = '';
            this.confirmPassword = '';
            this.agreedToTerms = false;

            if (response.data.role_id === 1) {
              this.$router.push({ name: 'ProfileAdmin' });
            } else {
              this.$router.push({ name: 'Profile' });
            }
          }
        })
        .catch(error => {
          console.error("Під час виконання запиту виникла помилка:", error);
          alert("Під час виконання запиту виникла помилка: " + error.message);
        });
    }
  }
};
</script>

<style>
.Reg {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: -275px;

}

.Reg-title-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.Reg-title {
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

.registration-form {
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

.personal_info {
    display: flex;
    justify-content: space-between;
}

.personal_info .form-group {
    flex: 1;
    margin-right: 10px;
}

.personal_info .form-group:last-child {
    margin-right: 0;
}

.Reg_info_text {
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

.login_link {
    text-decoration: none;
    color: #84C551;
    margin-bottom: 80px;
}

.login {
    text-align: center;
}
</style>
