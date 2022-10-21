<template>
  <div class="mt-32 relative ">
    <div class="absolute inset-1/4 w-1/2 p-8 rounded-lg h-96 shadow-3xl bg-gradient-to-br from-mf-500 to-mf-400 flex flex-col">
      <h1 class="text-center text-2xl	text-4xl mb-6">Login</h1>
      <label>Usuário: </label>
      <input
          class="bg-transparent border rounded p-2 border-mf-200 w-full text-gray-700 mr-3 leading-tight focus:outline-none"
          type="email"
          placeholder="e-mail"
      >

      <label class="mt-6">Senha: </label>
      <input
          class="bg-transparent border rounded p-2 border-mf-200 w-full text-gray-700 mr-3 leading-tight focus:outline-none"
          type="text"
          placeholder="senha"
      >

      <button class="focus:none bg-gradient-to-br from-mf-300 to-mf-500 mt-6 self-center p-2 rounded-lg w-64 shadow-3xl">
        Entrar
      </button>
      <a class="mt-6 text-center cursor-pointer">Esqueci minha senha</a>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',
  data() {
    return {}
  }
}
</script>
