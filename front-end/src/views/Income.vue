<template>
  <div class="m-8 mt-6 min-h-screen flex justify-center">
    <div class="px-8 mt-24 shadow-3xl bg-gradient-to-r from-mf-500 rounded-xl w-3/4 h-full">
      <div class="pt-8 pb-8 relative">
        <h1 class="font-bold mb-6 text-2xl">Nova Receita</h1>
        <label class="mb-4">Descrição: </label>
        <input
            class="bg-transparent border rounded p-2 border-mf-200 w-full text-gray-700 mr-3 leading-tight focus:outline-none"
            type="text"
            placeholder="Insira aqui a descrição da despesa"
        >

        <div class="flex justify-between mt-8">
          <div class="w-full flex flex-col">
            <label>Recorrência:</label>
            <select
                name="recurrence"
                id="recurrence"
                class="bg-transparent border border-mf-200 rounded focus:outline-none p-2 w-full"
            >
              <option value="volvo">Nenhuma</option>
              <option value="saab">Parcelada</option>
              <option value="mercedes">Fixa Mensal</option>
            </select>
          </div>

          <div class="w-full flex flex-col ml-8 mb-10">
            <label>Valor:</label>
            <input
                class="bg-transparent border rounded p-2 border-mf-200 w-full text-gray-700 mr-3 leading-tight focus:outline-none w-full"
                type="text"
                placeholder="R$ 0,00"
            >
          </div>

          <div class="w-full flex flex-col ml-8">
            <label>Data de Recebimento:</label>
            <input
                class="bg-transparent border rounded p-2 border-mf-200 w-full text-gray-700 mr-3 leading-tight focus:outline-none w-full"
                type="text"
                placeholder="18/10/2022"
            >
          </div>
        </div>
        <div class="flex justify-between mb-12">
          <div class="flex flex-col w-full">
            <label>Categoria:</label>
            <select
                name="recurrence"
                id="recurrence"
                class="bg-transparent border border-mf-200 rounded focus:outline-none w-full p-2"
            >
              <option value="alimentacao">Alimentação</option>
              <option value="transporte">Transporte</option>
            </select>
          </div>
          <div class="flex flex-col w-full ml-8">
            <label>Conta:</label>
            <select
                name="recurrence"
                id="recurrence"
                class="bg-transparent border border-mf-200 rounded focus:outline-none w-full p-2"
            >
              <option value="volvo">Conta</option>
              <option value="saab">Conta corrente</option>
            </select>
          </div>
        </div>
        <button class="absolute bottom-0 right-0 mb-4 focus:none bg-mf-300 hover:bg-mf-500 p-2 rounded w-24 justify-self-end">Salvar</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Income',
  data() {
    return {}
  }
}
</script>
