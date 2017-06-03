<template>
  <div id="app">
    <v-header></v-header>
    <router-view></router-view>
    <v-footer></v-footer>
  </div>
</template>

<script>
  import Header from "./components/Header.vue";
  import Footer from "./components/Footer.vue";
  export default {
    name: 'app',
    components: {
      "v-header": Header,
      "v-footer": Footer
    },
    created(){
      let loginUser = JSON.parse($.cookie('loginUser'));
      this.$store.state.loginUser = loginUser;
    }
  }
</script>

<style>

</style>
