import { createRouter, createWebHistory } from 'vue-router';
import Home from '../oll-pages/Home.vue';
import Catalog from '../oll-pages/Catalog.vue';
import Register from '../oll-pages/Register.vue';
import Login from '../oll-pages/Login.vue';
import Profile from '../oll-pages/Profile.vue';
import ProfileAdmin from '../oll-pages/Admin.vue';
import Shopping_cart from '../oll-pages/Shopping-cart.vue';

import Aduvantu from '@/components/goods/Aduvantu.vue';
import Retandantu from '@/components/goods/Retandantu.vue';
import Rodenticidu from '@/components/goods/Rodentrucudu.vue';
import Protryuvach from '@/components/goods/Protryuvach.vue';
import Insecticidu from '@/components/goods/Insectucudu.vue';
import Gerbicidu from '@/components/goods/Gerbicudu.vue';
import Fyngicidu from '@/components/goods/Fyngicudu.vue';
import Desicantu from '@/components/goods/Desukantu.vue';
import Add_goods from '@/components/profil_admin/pages_admin/add_goods.vue';
import Add_admin from '@/components/profil_admin/pages_admin/add_admin.vue';
import Reset_pas from '@/components/profile/profil-pages/unlock.vue'


const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/catalog', name: 'Catalog', component: Catalog },
  { path: '/register', name: 'Register', component: Register },
  { path: '/login', name: 'Login', component: Login },
  { path: '/profile', name: 'Profile', component: Profile, meta: { requiresAuth: true } },
  { path: '/admin', name: 'ProfileAdmin', component: ProfileAdmin, meta: { requiresAuth: true } },
  { path: '/gerbicidu', name: 'Gerbicidu', component: Gerbicidu },
  { path: '/fungicidu', name: 'Fyngicidu', component: Fyngicidu },
  { path: '/insecticidu', name: 'Insecticidu', component: Insecticidu },
  { path: '/desicantu', name: 'Desicantu', component: Desicantu },
  { path: '/protruvach', name: 'Protryuvach', component: Protryuvach },
  { path: '/adjuvantu', name: 'Aduvantu', component: Aduvantu },
  { path: '/rodenticidu', name: 'Rodenticidu', component: Rodenticidu },
  { path: '/retardantu', name: 'Retandantu', component: Retandantu },
  { path: '/add_goods', name: 'Add_goods', component: Add_goods, meta: { requiresAuth: true } },
  { path: '/add_admin', name: 'Add_admin', component: Add_admin },
  { path: '/shopping_cart', name: 'Shopping_cart', component: Shopping_cart, meta: { requiresAuth: true } },
  { path: '/reset_pas', name: 'Reset_pas', component: Reset_pas },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token');
  const loginTime = localStorage.getItem('loginTime');
  const maxSessionTime = 3600000; // 1 hour in milliseconds

  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (token && loginTime) {
      const currentTime = Date.now();
      if (currentTime - parseInt(loginTime, 10) > maxSessionTime) {
        localStorage.removeItem('token');
        localStorage.removeItem('loginTime');
        next({ name: 'Login' });
      } else {
        next();
      }
    } else {
      next({ name: 'Login' });
    }
  } else {
    next();
  }
});

export default router;
