<template>
  <div id="app" v-if="showHeader" class="bg-mf text-white px-6 w-full shadow-md fixed  top-0 z-50">
    <div class="flex justify-between items-center h-14">
      <a href="/">
        <h1>Minhas Finanças</h1>
      </a>
      <div class="flex relative items-center cursor-pointer">
        <button class="mx-1.5" @click="handleMenu()"><font-awesome-icon icon="fa-solid fa-bars" /></button>
        <div v-if="openMenu" class="w-34 h-52 pl-4 pr-4 bg-gradient-to-bl from-mf-500 to-mf-400 rounded-b-lg absolute inset-y-10 right-8 shadow-lg">
          <div class="flex flex-col">
            <router-link to="/categories" @click="handleMenu" class="mt-2">Gerenciar Categorias</router-link>
            <router-link to="/expense" @click="handleMenu" class="mt-2">Despesas</router-link>
            <router-link to="/income" @click="handleMenu" class="mt-2">Receitas</router-link>
            <router-link to="/investments" @click="handleMenu" class="mt-2">Investimentos</router-link>
            <router-link to="/investments" @click="handleMenu" class="mt-2">Configurações</router-link>
          </div>
        </div>
        <p class="mx-1.5" @click="logout()"><font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket" /></p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
axios.defaults.withCredentials = true;

export default {
  name: 'mf-header',
  data() {
    return {
      openMenu: false,
      showHeader: true,
    }
  },
  mounted() {
    if (this.$route.fullPath == '/login') {
      this.showHeader = false;
    }
  },
  methods: {
    handleMenu() {
      return !this.openMenu ? this.openMenu = true : this.openMenu = false
    },
    logout() {
      axios.post('http://localhost/api/logout').then(response => {
        this.$router.push({ name: 'login'})
      }).catch(error => {
        this.messageError = error
        this.seeMessageError = true
      });
    }

  }
}
</script>