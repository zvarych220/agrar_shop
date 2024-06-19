import { createRouter, createWebHistory } from 'vue-router';
import Home from '../oll-pages/Home.vue';
import Catalog from '../oll-pages/Catalog.vue';
import Register from '../oll-pages/Register.vue';
import Login from '../oll-pages/Login.vue';
import Profile from '../oll-pages/Profile.vue';

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
    name: 'Register',
    component: Register,
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token');
  const loginTime = localStorage.getItem('loginTime');
  const maxSessionTime = 36000; // 1 година в мілісекундах

  if (token && loginTime) {
    const currentTime = Date.now();
    if (currentTime - loginTime > maxSessionTime) {
      localStorage.removeItem('token');
      localStorage.removeItem('loginTime');
      next({ name: 'Login' });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;
