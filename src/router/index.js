import { createRouter, createWebHistory } from 'vue-router';
import Home from '../oll-pages/Home.vue'; // Компонент для головної сторінки
import Catalog from '../oll-pages/Catalog.vue'; // Компонент для сторінки каталогу

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/catalog',
    name: 'Catalog',
    component: Catalog,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
