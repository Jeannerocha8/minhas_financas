<template>
  <mf-message :see-message="seeMessageError ? true : false" :message="'Erro ao efetual login'" :icon="['fa', 'circle-exclamation']"/>
  <div class="mt-40 relative">
    <div class="absolute inset-1/4 w-1/2 p-8 rounded-lg h-96 shadow-3xl bg-gradient-to-br from-mf-500 to-mf-400 flex flex-col">
      <div class="flex justify-center mb-2">
        <img src="@/assets/images/logo-mf.png" class="w-14"/>
      </div>
      <label>Usuário: </label>
      <input
          v-model="email"
          class="bg-transparent border rounded p-2 border-mf-200 w-full text-white mr-3 leading-tight focus:outline-none"
          type="email"
          placeholder="e-mail"
          required
      >
      <label class="mt-6">Senha: </label>
      <input
          v-model="password"
          class="bg-transparent border rounded p-2 border-mf-200 w-full text-white mr-3 leading-tight focus:outline-none"
          type="password"
          placeholder="senha"
          required
      >

      <button @click="login" class="bg-mf-200 mt-6 self-center p-2 rounded-lg w-64 shadow-3xl hover:bg-mf-500">
        Entrar
      </button>
      <div class="text-center mt-4">
        <a class="mt-6 text-center cursor-pointer hover:text-mf-200">Esqueci minha senha &nbsp</a>
        <a href="/registration" class="mt-6 text-center cursor-pointer hover:text-mf-200">  Cadastrar-me</a>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import MfMessage from "../components/ui/MfMessage.vue";

axios.defaults.withCredentials = true;
export default {
  name: 'Login',
  components: {MfMessage},
  data() {
    return {
      email: '',
      password: '',
      seeMessageError: false,
      messageError: '',
    }
  },
  methods: {
    async login() {
      if (this.email && this.password) {
        await axios.get('http://localhost/sanctum/csrf-cookie').then(response => {
          axios.post('http://localhost/api/login', {
            email: this.email,
            password: this.password
          }).then(response => {
            this.$router.push({ name: 'dashboard', params: {userName: response.data.name}})
          }).catch(error => {
            this.messageError = 'Erro ao tentar efetuar o login'
            this.seeMessageError = true
          });
        });
      } else {
        this.messageError = 'O campo e-mail ou senha não devem ser nulos'
        this.seeMessageError = true
      }
    }
  }
}
</script>
