import { createRouter, createWebHistory } from 'vue-router'
import ShortenInputView from '../views/ShortenInputView.vue';
import CopyUrlView from '../views/CopyUrlView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'ShortenInputView',
      component: ShortenInputView
    },
    {
      path: '/copy',
      name: 'CopyUrlView',
      component: CopyUrlView
    }
  ]
})

export default router;
