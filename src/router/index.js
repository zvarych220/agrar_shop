import { createRouter, createWebHistory } from 'vue-router';
import Home from '../oll-pages/Home.vue';
import Catalog from '../oll-pages/Catalog.vue';
import Register from '../oll-pages/Register.vue';
import Login from '../oll-pages/Login.vue';
import Profile from '../oll-pages/Profile.vue';

import Aduvantu from '@/components/goods/Aduvantu.vue';
import Retandantu from '@/components/goods/Retandantu.vue';
import Rodenticidu from '@/components/goods/Rodentrucudu.vue';
import Protryuvach from '@/components/goods/Protryuvach.vue';
import Insecticidu from '@/components/goods/Insectucudu.vue';
import Gerbicidu from '@/components/goods/Gerbicudu.vue';
import Fyngicidu from '@/components/goods/Fyngicudu.vue';
import Desicantu from '@/components/goods/Desukantu.vue';

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/catalog', name: 'Catalog', component: Catalog },
  { path: '/register', name: 'Register', component: Register },
  { path: '/login', name: 'Login', component: Login },
  { path: '/profile', name: 'Profile', component: Profile },
  { path: '/gerbicidu', name: 'Gerbicidu', component: Gerbicidu },
  { path: '/fungicidu', name: 'Fyngicidu', component: Fyngicidu },
  { path: '/insecticidu', name: 'Insecticidu', component: Insecticidu },
  { path: '/desicantu', name: 'Desicantu', component: Desicantu },
  { path: '/protruvach', name: 'Protryuvach', component: Protryuvach },
  { path: '/adjuvantu', name: 'Aduvantu', component: Aduvantu },
  { path: '/rodenticidu', name: 'Rodenticidu', component: Rodenticidu },
  { path: '/retardantu', name: 'Retandantu', component: Retandantu },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token');
  const loginTime = localStorage.getItem('loginTime');
  const maxSessionTime = 3600000; // 1 година в мілісекундах

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
