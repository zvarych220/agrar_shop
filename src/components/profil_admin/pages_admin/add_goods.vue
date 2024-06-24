<template>
  <div>
    <form @submit.prevent="createGood" enctype="multipart/form-data">
      <div>
        <label for="title">Назва товару:</label>
        <input type="text" id="title" v-model="good.title" required>
      </div>
      <div>
        <label for="image">Фото товару:</label>
        <input type="file" id="image" @change="onFileChange" required>
      </div>
      <div>
        <label for="price">Ціна:</label>
        <input type="number" id="price" v-model="good.price" required>
      </div>
      <div>
        <label for="type_id">Тип товару:</label>
        <select id="type_id" v-model="good.type_id" required>
          <option v-for="type in types" :key="type.type_id" :value="type.type_id">{{ type.type_name }}</option>
        </select>
      </div>
      <div>
        <label for="action">Акційний товар:</label>
        <input type="checkbox" id="action" v-model="good.action">
      </div>
      <button type="submit">Створити товар</button>
    </form>
    <div v-if="createdGood">
      <h3>Товар створено:</h3>
      <p>Назва: {{ createdGood.title }}</p>
      <p>Ціна: {{ createdGood.price }}</p>
      <p>Тип: {{ createdGood.type_id }}</p>
      <p>Акційний: {{ createdGood.action ? 'Так' : 'Ні' }}</p>
      <img :src="`http://localhost/agrar_shop/Backend/uploads/${createdGood.image}`" alt="Фото товару" />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      good: {
        title: '',
        image: null,
        price: 0,
        type_id: '',
        action: false,
      },
      types: [],
      createdGood: null,
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
    onFileChange(e) {
      const file = e.target.files[0];
      this.good.image = file;
    },
    createGood() {
      const formData = new FormData();
      formData.append('title', this.good.title);
      formData.append('image', this.good.image);
      formData.append('price', this.good.price);
      formData.append('type_id', this.good.type_id);
      formData.append('action', this.good.action ? 1 : 0);

      fetch('http://localhost/agrar_shop/Backend/add_goods.php', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          this.createdGood = {
            title: this.good.title,
            image: data.image_path,
            price: this.good.price,
            type_id: this.good.type_id,
            action: this.good.action,
          };
          alert('Товар створено успішно!');
        } else {
          alert('Помилка при створенні товару: ' + data.error);
        }
      })
      .catch(error => console.error('Error creating good:', error));
    },
  },
};
</script>
