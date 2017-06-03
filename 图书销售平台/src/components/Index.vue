<template>
  <div id="index">
    <v-banner></v-banner>
    <v-content></v-content>
  </div>
</template>
<script>
  import Banner from "./Banner.vue";
  import Content from "./Content.vue";
  export default{
    components: {
      "v-banner": Banner,
      "v-content": Content
    }
  }
</script>
<style>

</style>
