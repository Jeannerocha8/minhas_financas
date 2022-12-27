import { createRouter, createWebHistory } from 'vue-router'

import Dashboard from "../views/Dashboard.vue";
import Expense from "../views/Expense.vue";
import Income from "../views/Income.vue";
import Login from "../views/Login.vue";
import Registration from "../views/Registration.vue";
import Categories from "../views/Categories.vue";

const routes = [
  {
    path: '/dashboard/:userName',
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
  },
  {
    path: '/registration',
    name: 'registration',
    component: Registration
  },
  {
    path:'/categories',
    name: 'categories',
    component: Categories
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
