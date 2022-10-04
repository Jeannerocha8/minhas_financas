<template>
    <div class="m-8">
      <p class="text-xl text-white font-bold">{{ chart.title }}</p>
      <div id="chart" class="mt-4 flex justify-center">
        <apexchart type="pie" width="380" :options="chartOptions" :series="series"></apexchart>
      </div>
    </div>
</template>

<script>

import VueApexCharts from "vue3-apexcharts";

export default {
  name: 'mf-chart',
  props: ['chart'],
  components: {apexchart: VueApexCharts},
  data() {
    return {
      series: this.chart.series,
      chartOptions: {
        theme: {
          monochrome: {
            enabled: true,
            color: '#1A232A',
          }
        },
        chart: {
          width: 380,
          type: 'pie',
        },
        stroke: {
          show: false,
        },
        legend: {
          show: false
        },
        labels: this.chart.labels,
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
          }
        }]
      },
    }
  }
}
</script>