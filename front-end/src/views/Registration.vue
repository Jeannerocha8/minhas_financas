<template>
  <div v-if="seeMessageError" class="static">
    <div class="absolute top-16 left-96 w-1/2 h-auto rounded-lg bg-mf-200">
      <div class="p-2 flex flex-row">
        <p class="m-1 text-sm">{{ messageError }}</p>
      </div>
      <div
          @click="seeMessageError=false"
          class="absolute -top-2 inset-y-1 -right-1 bg-mf-300 w-6 h-6 rounded-full shadow-3xl">
        <font-awesome-icon icon="fa-solid fa-xmark" class="ml-2" />
      </div>
    </div>
  </div>
  <div class="mt-40 relative">
    <div class="absolute inset-1/4 w-1/2 p-8 rounded-lg h-96	 shadow-3xl bg-gradient-to-br from-mf-500 to-mf-400 flex flex-col">
      <h1 class="text-center text-2xl mb-2">Cadastre-se</h1>
      <label>Nome: </label>
      <input
          v-model="name"
          class="bg-transparent border rounded p-2 border-mf-200 w-full text-white mr-3 leading-tight focus:outline-none"
          type="text"
          placeholder="nome"
          required
      >

      <label class="mt-5">E-mail: </label>
      <input
          v-model="email"
          class="bg-transparent border rounded p-2 border-mf-200 w-full text-white mr-3 leading-tight focus:outline-none"
          type="email"
          placeholder="email"
          required
      >

      <label class="mt-5">Senha: </label>
      <input
          v-model="password"
          class="bg-transparent border rounded p-2 border-mf-200 w-full text-white mr-3 leading-tight focus:outline-none"
          type="password"
          placeholder="senha"
          required
      >

      <button @click="createUser" class="bg-mf-200 mt-6 self-center p-2 rounded-lg w-64 shadow-3xl hover:bg-mf-500">
        Salvar
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";
axios.defaults.withCredentials = true;

export default {
  name: 'Registration',
  data() {
    return {
      name: '',
      email: '',
      password: '',
      seeMessageError: false,
      messageError: '',
    }
  },
  methods: {
    async createUser() {
      await axios.get('http://localhost/sanctum/csrf-cookie').then(response => {
        axios.post('http://localhost/api/user/store', {
          name: this.name,
          email: this.email,
          password: this.password,
        }).then(response => {
          console.log('localhost/api/user/store',response);
          this.messageError = 'Cadastrado com Sucesso'
          this.seeMessageError = true;
        }).catch(error => {
          this.messageError = error.response.data.message;
          this.seeMessageError = true;
        });
      });
    }
  }
}
</script>