<template>
  <section>
    <Menu />
    <div class="add-title-container">
      <h2 class="add-title">
        <img :src="Xz" alt="" class="xz"> Створити товар <img :src="Xz_2" alt="" class="xz">
      </h2>
    </div>
    <div class="add-goods-form">
      <form @submit.prevent="createGood" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">Назва товару:</label>
          <input type="text" id="title" v-model="good.title" required class="in_info" />
        </div>
        <div class="form-group">
          <label>Фото товару:</label>
          <input type="file" id="image" ref="fileInput" @change="onFileChange" required class="file-input" />
          <button type="button" @click="triggerFileInput" class="custom-file-button">Вибрати файл</button>
          <span class="file-name">{{ fileName }}</span>
        </div>
        <div class="form-group">
          <label for="price">Ціна:</label>
          <input type="number" id="price" v-model="good.price" required class="in_info" />
        </div>
        <div class="form-group">
          <label for="type_id">Тип товару:</label>
          <select id="type_id" v-model="good.type_id" required class="in_info">
            <option v-for="type in types" :key="type.type_id" :value="type.type_id">{{ type.type_name }}</option>
          </select>
        </div>
        <div class="form-group-label">
          <label for="action">
            <input type="checkbox" id="action" v-model="good.action" class="checkbox" />
            Акційний товар
          </label>
        </div>
        <button type="submit" class="submit">Створити товар</button>
      </form>
    </div>
    <Footer />
  </section>
</template>

<script>
import Menu from '@/components/Menu.vue';
import Footer from '@/components/footer.vue';

import Xz from "@/assets/xz.svg";
import Xz_2 from "@/assets/xz_2.svg";

export default {
  components: {
    Menu,
    Footer
  },
  data() {
    return {
      Xz_2,
      Xz,
      good: {
        title: '',
        image: null,
        price: 0,
        type_id: '',
        action: false,
      },
      types: [],
      createdGood: null,
      fileName: 'Файл не вибрано',
    };
  },
  created() {
    fetch('http://localhost/agrar_shop/Backend/scan_types.php')
      .then(response => response.json())
      .then(data => {
        this.types = data.types;
      })
      .catch(error => console.error('Error fetching types:', error));
  },
  methods: {
    triggerFileInput() {
      this.$refs.fileInput.click();
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.good.image = file;
      this.fileName = file ? file.name : 'Файл не вибрано';
    },
    async createGood() {
      const formData = new FormData();
      formData.append('title', this.good.title);
      formData.append('image', this.good.image);
      formData.append('price', this.good.price);
      formData.append('type_id', this.good.type_id);
      formData.append('action', this.good.action ? 1 : 0);

      try {
        const response = await fetch('http://localhost/agrar_shop/Backend/add_goods.php', {
          method: 'POST',
          body: formData,
        });

        const data = await response.json();
        if (data.success) {
          this.createdGood = {
            ...this.good,
            image: data.success, // тут використовуємо шлях, який повертає PHP
          };
        } else {
          console.error('Error:', data.error);
        }
      } catch (error) {
        console.error('Error:', error);
      }
    },
  },
};
</script>
<style>
.add-title-container {
  margin-top: -200px;
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
  max-width: 400px;
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

.file-input {
  display: none;
}

.custom-file-button {
  padding: 10px 15px;
  background-color: #E74E13;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 20px;
}

.custom-file-button:hover {
  background-color: #8C3213;
}

.file-name {
  margin-left: 10px;
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
