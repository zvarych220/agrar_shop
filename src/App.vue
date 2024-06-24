<template>
  <router-view></router-view>
</template>

<script>
export default {
  mounted() {
    this.checkSession();
    this.startSessionCheckInterval();
  },
  methods: {
    checkSession() {
      const token = localStorage.getItem('token');
      const loginTime = localStorage.getItem('loginTime');
      const maxSessionTime = 3600000; // 1 година в мілісекундах

      if (token && loginTime) {
        const currentTime = Date.now();
        if (currentTime - loginTime > maxSessionTime) {
          this.logout();
        }
      }
    },
    startSessionCheckInterval() {
      setInterval(() => {
        this.checkSession();
      }, 60000); // Перевірка кожні 60 секунд
    },
    logout() {
      localStorage.removeItem('token');
      localStorage.removeItem('loginTime');
      this.$router.push({ name: 'Login' });
    }
  }
};
</script>

<style>
/* Ваш CSS код */
</style>
