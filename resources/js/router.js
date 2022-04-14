import { createWebHistory, createRouter } from 'vue-router'

import Index from './Pages/index.vue'

const routes = [
  {
    path: '/',
    component: Index,
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router