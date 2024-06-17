import { createRouter, createWebHistory } from 'vue-router';
import Home from '../oll-pages/Home.vue'; 
import Catalog from '../oll-pages/Catalog.vue'; 
import Register from '../oll-pages/Register.vue';

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
  {
    path: '/register',
    name:'Register',
    component: Register,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
