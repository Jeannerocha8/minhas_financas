<template>

  <div v-if="seeMessageError" class="static">
    <div class="absolute top-8 left-4 w-1/5 h-10 rounded-lg bg-mf-200">
      <div class="mt-2 ml-4 flex flex-row">
        <p class="ml-2 text-sm">Erro ao tentar efetuar o login</p>
      </div>
      <div
          @click="seeMessageError=false"
          class="absolute -top-2 inset-y-1 -right-1 bg-mf-300 w-6 h-6 rounded-full shadow-3xl">
        <font-awesome-icon icon="fa-solid fa-xmark" class="ml-2" />
      </div>
    </div>
  </div>

  <div class="mt-40 relative">
    <div class="absolute inset-1/4 w-1/2 p-8 rounded-lg h-96 shadow-3xl bg-gradient-to-br from-mf-500 to-mf-400 flex flex-col">
      <h1 class="text-center text-2xl	text-4xl mb-6">Login</h1>
      <label>Usuário: </label>
      <input
          v-model="email"
          class="bg-transparent border rounded p-2 border-mf-200 w-full text-white mr-3 leading-tight focus:outline-none"
          type="email"
          placeholder="e-mail"
      >
      <label class="mt-6">Senha: </label>
      <input
          v-model="password"
          class="bg-transparent border rounded p-2 border-mf-200 w-full text-white mr-3 leading-tight focus:outline-none"
          type="password"
          placeholder="senha"
      >

      <button @click="login" class="focus:none bg-gradient-to-br from-mf-300 to-mf-500 mt-6 self-center p-2 rounded-lg w-64 shadow-3xl">
        Entrar
      </button>
      <a class="mt-6 text-center cursor-pointer">Esqueci minha senha</a>
    </div>
  </div>
</template>

<script>
import axios from "axios";
axios.defaults.withCredentials = true;
export default {
  name: 'Login',
  data() {
    return {
      email: '',
      password: '',
      seeMessageError: false
    }
  },
  methods: {
    async login() {
      console.log(this.email, this.password)
      await axios.get('http://localhost/sanctum/csrf-cookie').then(response => {
        axios.post('http://localhost/api/login', {
              email: this.email,
              password: this.password
        }).then(response => {
          this.$router.push('dashboard')
        }).catch(error => {
          console.log(error)
          this.seeMessageError = true
        });
      });
    }
  }
}
</script>
