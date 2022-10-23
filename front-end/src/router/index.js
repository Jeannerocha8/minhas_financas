import { createRouter, createWebHistory } from 'vue-router'

import Dashboard from "../views/Dashboard.vue";
import Expense from "../views/Expense.vue";
import Income from "../views/Income.vue";
import Login from "../views/Login.vue";

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
    path: '/login',
    name: 'login',
    component: Login
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
