<template>
    <section class="user-conteiner">
      <Menu />
      <div class="user-list-container">
        <h2 class="user-list-title">Користувачі</h2>
        <table class="user-table">
          <thead>
            <tr>
              <th>№</th>
              <th>Ім'я</th>
              <th>Прізвище</th>
              <th>Email</th>
              <th>Роль</th>
              <th>Дія</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.id">
              <td>{{ user.id }}</td>
              <td>{{ user.first_name }}</td>
              <td>{{ user.last_name }}</td>
              <td>{{ user.email }}</td>
              <td>{{ user.role_name }}</td>
              <td>
                <button @click="makeAdmin(user.id)" class="custom-button">Зробити адміном</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <Footer />
    </section>
  </template>
  
  <script>
import Menu from '@/components/Menu.vue';
import Footer from '@/components/footer.vue';
  
  export default {
    components: {
      Menu,
      Footer
    },
    data() {
      return {
        users: []
      }
    },
    methods: {
      fetchUsers() {
        fetch('http://localhost/agrar_shop/Backend/getting-a-list-of-users.php')
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              this.users = data.users;
            } else {
              alert(data.message);
            }
          });
      },
      makeAdmin(userId) {
        fetch('http://localhost/agrar_shop/Backend/add_admin.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ userId })
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert('Користувача призначено адміном.');
              this.fetchUsers();
            } else {
              alert(data.message);
            }
          });
      }
    },
    mounted() {
      this.fetchUsers();
    }
  }
  </script>
  
  <style>
  
  .user-list-container {
    margin-top: -300px;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    padding-bottom: 60px;
  }
  
  .user-list-title {
    font-weight: 700;
    font-size: 45px;
    color: #000;
    font-family: var(--font-family);
    text-align: center;
    margin-bottom: 40px;
    margin-top: -200px;
  }
  
  .user-table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .user-table th, .user-table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
  }
  
  .user-table th {
    background-color: #f4f4f4;
  }
  
  .custom-button {
    padding: 10px 15px;
    background-color: #E74E13;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 20px;
  }
  
  .custom-button:hover {
    background-color: #8C3213;
  }
  </style>
  