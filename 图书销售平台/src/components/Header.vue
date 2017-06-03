<template>
  <div id="header">
    <div class="wrapper">
      <router-link to="/index"><div class="logo">学府书城</div></router-link>
      <div class="search">
        <input type="text" placeholder="请输入书籍信息" v-model="keywords" @keyup.enter="search">
        <i class="fa fa-search" @click="search"></i>
      </div>
      <!-- 当有用户登录时显示 -->
      <div v-if="$store.state.loginUser">
        <v-loginSuccess></v-loginSuccess>
      </div>
      <!-- 没有用户登录时显示 -->
      <div v-else>
        <v-nav></v-nav>
      </div>
    </div>
  </div>
</template>
<script>
  import Nav from "./Nav.vue";
  import LoginSuccess from "./loginSuccess.vue";
  export default{
    data(){
      return {
        loginUser: "",
        keywords: ""
      };
    },
    components: {
      "v-nav": Nav,
      "v-loginSuccess": LoginSuccess
    },
    methods: {
      search(){
        if(!this.keywords){
          alert("请输入关键字");
        }else{
          this.$router.push({ name: 'SearchResult', params: { keywords: this.keywords }});
        }
      }
    }
  }
</script>
<style>
  #header {
    height: 80px;
  }

  #header .wrapper {
    width: 1200px;
    margin: 0 auto;
    height: 100%;
  }

  #header .logo {
    height: 100%;
    line-height: 80px;
    float: left;
  }

  #header .search {
    width: 650px;
    height: 30px;
    float: left;
    margin-top: 25px;
    margin-left: 200px;
  }

  #header input {
    height: 28px;
    outline: none;
    text-indent: 10px;
    border: 1px solid #ccc;
    width: 600px;
    float: left;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
  }

  #header input:focus {
    border-color: #3b99fc;
  }

  #header .fa-search {
    float: left;
    color: #fff;
    background: rgba(0, 0, 0, 0.6);
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    cursor: pointer;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
  }

  #header .fa-search:hover {
    background: rgba(0, 0, 0, 1);
  }
</style>
