<template>
  <ul id="nav">
    <li>
      <router-link to="/index">首页</router-link>
    </li>
    <li>
      <router-link to="/login">登录</router-link>
    </li>
    <li>
      <router-link to="/regist">注册</router-link>
    </li>
  </ul>
</template>
<script>
  export default{

  }
</script>
<style>
  #nav {
    float: right;
    height: 80px;
  }

  #nav li {
    float: left;
    margin: 0 15px 0 15px;
    font-size: 16px;
    height: 100%;
    line-height: 80px;
  }
</style>
