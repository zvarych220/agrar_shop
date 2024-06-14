import { createRouter, createWebHistory } from 'vue-router';
import Home from '../oll-pages/Home.vue'; 
import Catalog from '../oll-pages/Catalog.vue'; 

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
