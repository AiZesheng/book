<template>
  <div id="loginSuccess">
    <span class="login_user"><router-link to="/order">当前用户: &nbsp;{{$store.state.loginUser.nickname}}</router-link></span>
    <span class="shopping-cal"><router-link :to='{name: "shoppingcar", params: {url: "http://localhost/book_php/user/get_shoppingcar"}}'>我的购物车</router-link></span>
    <span class="quit" @click="quit">退出</span>
  </div>
</template>
<script>
  export default{
    methods: {
      quit(){
        let isQuit = confirm("是否退出");
        if (isQuit) {
          // 清空store
          this.$store.state.loginUser = "";
          // 清空cookie
          $.cookie("loginUser", null);
          // 重定向路由为index
          this.$router.push("/index");
        }
      }
    }
  }
</script>
<style>
  #loginSuccess {
    height: 80px;
    line-height: 80px;
    font-size: 15px;
  }

  #loginSuccess .shopping-cal {
    margin-left: 15px;
    float: left;
  }

  #loginSuccess .quit {
    margin-left: 15px;
    float: left;
  }

  #loginSuccess .login_user {
    max-width: 134px;
    float: left;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
