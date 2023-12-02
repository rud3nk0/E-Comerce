import { createRouter, createWebHistory } from 'vue-router'
// @ts-ignore
import ProductDetails from "../views/ProductDetails.vue";
// @ts-ignore
import HomeView from '../views/HomeView.vue'

// @ts-ignore
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/product/:id', // Используйте параметр для передачи ID товара в URL
      name: 'ProductDetails',
      component: ProductDetails,
      props: true,
    },
  ]
})

export default router
