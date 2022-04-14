import { createWebHistory, createRouter } from 'vue-router'

import Index from './Pages/index.vue'

const routes = [
  {
    path: '/',
    redirect: to => {
      return { path: '/admin' }
    },
    component: Index,
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

/**
 * can meta: { auth: true }
 */
router.beforeEach(async (to, from) => {
  return true
})

export default router