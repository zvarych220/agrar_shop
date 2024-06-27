<template>
  <section>
    <div class="title">
      <h2 class="product-title">
        <img :src="Xz" alt="Xz" /> Засоби захисту рослин <img :src="Xz_2" alt="Xz_2" />
      </h2>
    </div>
    <div class="content">
      <div class="menu_profile">
        <ul class="sidebar-menu">
          <li class="menu-list" v-for="item in menuItems" :key="item.id">
            <a href="#" class="list-link" :class="{ active: item.active }"
              @mouseover="item.hover = true" @mouseleave="item.hover = false"
              @click.prevent="redirectToCategory(item.id)">
              {{ item.text }}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </section>
</template>

<script>
import Xz from "@/assets/xz.svg";
import Xz_2 from "@/assets/xz_2.svg";

export default {
  data() {
    return {
      Xz,
      Xz_2,
      menuItems: [
        { id: 1, text: "Гербіциди", hover: false, active: false },
        { id: 2, text: "Фунгіциди", hover: false, active: false },
        { id: 3, text: "Інсектициди", hover: false, active: false },
        { id: 4, text: "Десиканти", hover: false, active: false },
        { id: 5, text: "Протруювачі", hover: false, active: false },
        { id: 6, text: "Ад’юванти", hover: false, active: false },
        { id: 7, text: "Родентициди", hover: false, active: false },
        { id: 8, text: "Ретарданти", hover: false, active: false }
      ]
    };
  },
  methods: {
    setActive(selectedItem) {
      this.menuItems.forEach(item => {
        item.active = item === selectedItem;
      });
    },
    redirectToCategory(categoryId) {
  switch (categoryId) {
    case 1:
      this.$router.push("/gerbicidu");
      break;
    case 2:
      this.$router.push("/fungicidu");
      break;
    case 3:
      this.$router.push("/insecticidu");
      break;
    case 4:
      this.$router.push("/desicantu");
      break;
    case 5:
      this.$router.push("/protruvach");
      break;
    case 6:
      this.$router.push("/adjuvantu");
      break;
    case 7:
      this.$router.push("/rodenticidu");
      break;
    case 8:
      this.$router.push("/retardantu");
      break;
    default:
      // Handle default case or error
      break;
  }
}

  }
};
</script>

<style scoped>
section {
  height: 10px;
  display: flex;
  justify-content: center;
  align-items: flex-start;
}

.content {
  padding-bottom: 230px;
  display: flex;
  flex-direction: row;
  align-items: flex-start;
}

.product-title {
  margin-top: -190px;
  font-weight: 700;
  font-size: 45px;
  color: #000;
  font-family: "Montserrat", sans-serif;
  text-align: center;
  width: 100%;
  margin-bottom: 40px;
  position: relative;
  left: 50%;
  transform: translateX(-50%);
}

.menu_profile {
  margin-top: -100px;
  margin-left: -1000px;
  width: 255px;
}

.sidebar-menu {
  list-style: none;
  padding: 0;
  border-radius: 20px;
  background-color: #F4F4F4;
}

.list-link {
  display: flex;
  align-items: center;
  text-decoration: none;
  color: black;
  padding: 20px;
  padding-right: 30px;
  border-radius: 0;
  transition: transform 0.3s ease, background-color 0.3s ease, border-radius 0.3s ease;
}

.list-link:hover,
.list-link.active {
  background-color: #84C551;
  border-radius: 20px;
}
</style>
