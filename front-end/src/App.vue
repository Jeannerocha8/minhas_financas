<template>
  <mf-header />
  <router-view/>
  <mf-footer />
</template>

<script>
import MfHeader from "./components/ui/MfHeader.vue";
import MfFooter from "./components/ui/MfFooter.vue";

export default {
  name: 'App',
  components: {MfFooter, MfHeader},
}
</script>
