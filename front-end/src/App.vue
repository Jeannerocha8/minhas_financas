<template class="ellipse">
  <mf-header v-if="nameRoute != 'login'" />
  <router-view/>
  <mf-footer v-if="nameRoute != 'login'" />
</template>

<script>
import MfHeader from "./components/ui/MfHeader.vue";
import MfFooter from "./components/ui/MfFooter.vue";
export default {
  name: 'App',
  components: {MfFooter, MfHeader},
  data() {
    return {
      nameRoute: '',
    }
  },
  watch:{
    $route () {
      this.nameRoute = this.$route.name;
    },
  }

}
</script>

<style>
.ellipse{
  width: 6000px;
  height: 1000px;
  line-height: 100px;
  text-align: center;
  background: radial-gradient(circle, #ffffff 0%, #ffffff 59%, #dcdcdc 100%);
}
</style>