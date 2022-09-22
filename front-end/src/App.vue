<template>
  <mf-header />
  <div class="mt-6 min-h-screen">
    <div class="flex justify-between items-center px-8">
      <p class="text-xl font-medium">Bem Vinda, Maria</p>
      <div class="bg-mf-300 rounded-md h-8 flex justify-end items-center relative px-2">
        <input class="w-full bg-mf-300 rounded h-92 text-mf-150" placeholder="Pesquisar">
        <p><font-awesome-icon icon="fa-solid fa-magnifying-glass" /></p>
      </div>
    </div>
    <mf-footer />
  </div>
</template>

<script>

import MfHeader from "./components/ui/MfHeader.vue";
import MfFooter from "./components/ui/MfFooter.vue";
export default {
  name: 'App',
  components: {MfFooter, MfHeader},
}
</script>
