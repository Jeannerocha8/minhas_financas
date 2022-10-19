import { createRouter, createWebHistory } from 'vue-router'

import Dashboard from "../views/Dashboard.vue";
import Expense from "../views/Expense.vue";
import Income from "../views/Income.vue";
import Investments from "../views/Investments.vue";

const routes = [
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard
  },
  {
    path: '/expense',
    name: 'expense',
    component: Expense
  },
  {
    path: '/income',
    name: 'income',
    component: Income
  },
  {
    path: '/investments',
    name: 'investments',
    component: Investments

  }
  // {
  //   path: '/about',
  //   name: 'about',
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: function () {
  //     return import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  //   }
  // }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
