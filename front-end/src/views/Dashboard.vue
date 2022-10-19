<template>
  <div class="mt-6 min-h-screen">
    <div class="flex justify-between px-8 mt-20 m-4">
      <div>
        <p class="text-xl font-medium">Bem Vindo(a), {{ data.username }}</p>
      </div>
      <div>
        <div class="rounded-md flex justify-end items-center relative ">
          <input class="w-80 px-2.5 bg-mf-300 rounded h-8 text-mf-150" placeholder="Pesquisar">
          <p class="absolute mr-2.5"><font-awesome-icon icon="fa-solid fa-magnifying-glass" /></p>
        </div>
      </div>
    </div>
    <div class="flex flex-row mt-2 px-8 ">
      <div v-for="chart in data.charts"
           class="bg-gradient-to-b from-mf-200 to-mf-400 h-96 w-2/4 m-4 rounded-lg shadow-2xl shadow-black">
        <mf-chart :chart="chart"/>
      </div>
    </div>
    <div class="flex flex-row mb-8 px-8">
      <div v-for="itemCard in data.itemsCard"
           class="bg-gradient-to-b from-mf-200 to-mf-400 h-96 w-1/3 m-4 rounded-lg shadow-2xl shadow-black">
        <mf-item :data="itemCard"/>
      </div>
    </div>
  </div>
</template>

<script>
import MfItem from "../components/ui/MfItem.vue";
import MfChart from "../components/ui/MfChart.vue";

export default {
  name: 'Dashboard',
  components: {MfChart, MfItem},
  data() {
    return {
      data: {
        username: 'Maria Clara',
        itemsCard: {
          transactions: {
            title: 'Últimas transações',
            items: [
              {
                description: 'Salário',
                date: '03/10/2022',
                value: '4.000,00',
                icon: 'fa-solid fa-arrow-up',
                type: 'income',
                category: '',
              },
              {
                description: 'Concerto do carro',
                date: '15/09/2022',
                value: '1.000,00',
                icon: 'fa-solid fa-arrow-down',
                type: 'expense',
                category: '',
              }
            ]
          },
          spendingByCategory: {
            title: 'Gastos por categoria',
            items: [
              {
                description: 'Alimentação',
                date: '03/10/2022',
                value: '4.000,00',
                icon: 'fa-solid fa-utensils',
                type: 'income',
                category: 'food'
              },
              {
                description: 'Moradia',
                date: '15/09/2022',
                value: '1.000,00',
                icon: 'fa-solid fa-house',
                type: 'expense',
                category: 'home',
              }
            ],
          },
          investments: {
            title: 'Investimentos',
            items: [
              {
                description: 'CDB 100%',
                date: '15/09/2022',
                value: '1.000,00',
                icon: 'fa-solid fa-dollar-sign',
                type: 'investments',
                category: 'investments',
              }
            ],
          },
        },
        charts: {
          expenseChartOfTheMonth: {
            title: 'Despesas do mês por categoria',
            series: [1000, 2000, 400, 900],
            labels: ['Alimentação', 'Moradia', 'transporte', 'cartão de crédito'],
          },
          incomeExpenseChart: {
            title: 'Receita x Despesas',
            series: [7000, 2000],
            labels: ['Receita', 'Despesa']
          },
        },
      },
    }
  }
}
</script>
