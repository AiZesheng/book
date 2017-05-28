<template>
  <div id="regist">
    <div class="wrapper">
      <div id="header">
        <img class="card" src="../../static/img/card.png" alt="">
        <div class="title">注册通行证</div>
      </div>
      <div class="hr"></div>
      <table id="form" style="background: #fff;">
        <tr>
          <td>用户名</td>
          <td>
            <input id="username" type="text" placeholder="请输入用户名" v-model="username">
            <span id="have"></span>
            <div class="ps">4-16位中文、英文、数字、下划线或减号，注册后不可修改</div>
          </td>
        </tr>
        <tr>
          <td>密&nbsp;&nbsp; 码</td>
          <td>
            <input type="password" placeholder="请输入密码" v-model="password">
            <div class="ps">由6-16位字符组成</div>
          </td>
        </tr>
        <tr>
          <td>确认密码</td>
          <td>
            <input type="password" placeholder="请再次输入密码" v-model="password2">
            <span id="same"></span>
            <div class="ps">由6-16位字符组成</div>
          </td>
        </tr>
        <tr>
          <td>昵&nbsp;&nbsp; 称</td>
          <td>
            <input type="text" placeholder="请输入昵称" v-model="nickname">
            <div class="ps">4-16位中文、英文、数字组成</div>
          </td>
        </tr>
        <tr>
          <td>验证码</td>
          <td>
            <a class="code" href="javascript:;" @click="code">
              <div>1</div>
              <div>2</div>
              <div>3</div>
              <div>4</div>
            </a>
            <a class="change" href="javascript:;" @click="code">换一张</a>
            <br><br><br>
            <div class="ps">4位数字组成</div>
            <input type="text" placeholder="请输入验证码" class="code-input">
            <span id="error"></span>
            <div id="submit"><img src="../../static/img/regist.gif" alt=""></div>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>
<script>
  export default{
    data(){
      return {
        username: "",
        password: "",
        password2: "",
        nickname: "",
      };
    },
    methods: {
      code(){ // 该函数用来生成验证码
        let oCoadNum = document.querySelectorAll(".code div");
        for (let i = 0; i < oCoadNum.length; i++) {
          let random1 = Math.floor(Math.random() * 60 - 30);
          let random2 = Math.floor(Math.random() * 60 - 30);
          let random0 = Math.floor(Math.random() * 10);
          let random3 = Math.floor(Math.random() * 900000 + 100000);
          oCoadNum[i].style.transform = "skew(" + random1 + "deg," + random2 + "deg)";
          oCoadNum[i].style.color = "#" + random3;
          oCoadNum[i].innerHTML = random0;
        }
      }
    },
    mounted(){
      this.code();
      let oSubmit = document.getElementById("submit");
      let that = this;
      oSubmit.onclick = function(){
        if(that.password != that.password2){
          alert("两次输入的密码不一致");
          return false;
        }
        that.$http.jsonp('http://localhost/book_php/user/regist', {
          params: {
            username: that.username,
            password: that.password,
            nickname: that.nickname
          }
        }, {jsonp: 'callback'}).then(function (res) {
          if(res.data == 1){
            alert("注册成功");
            //路由重定向
            this.$router.push("/login");
          }
        }, function (res) {
          console.log(res.status);
        });
      };
    }
  }
</script>
<style>
  #header {
    height: 80px;
  }

  #header .card {
    width: 55px;
    height: 35px;
    float: left;
    margin-top: 35px;
  }

  #header .title {
    float: left;
    font-size: 30px;
    font-weight: bold;
    color: #777;
    margin-top: 37px;
    margin-left: 10px;
  }

  #header .login {
    float: right;
    margin-top: 55px;
    font-size: 12px;
    color: #2ec100;
  }

  #header .login:hover {
    color: #ff9a35;
  }

  .hr {
    height: 2px;
    background: rgba(0, 0, 0, 0.1);
  }

  #regist .wrapper {
    width: 800px;
    margin: 0 auto;
    overflow: hidden;
  }

  #form {
    margin-top: 10px;
  }

  #form td {
    padding-top: 20px;
  }

  #form tr td:first-child {
    font-size: 14px;
    font-weight: bold;
    vertical-align: top;
    line-height: 22px;
    padding-left: 10px;
  }

  #form tr td:last-child {
    padding-left: 20px;
  }

  #form input {
    width: 180px;
    height: 20px;
    border: 1px solid #999;
    text-indent: 5px;
    outline: none;
  }

  #form input:focus {
    border-color: #2aa0ff;
  }

  #form .ps {
    color: #888;
    font-size: 12px;
    margin-top: 9px;
  }

  #form .code {
    display: block;
    width: 118px;
    height: 48px;
    border: 1px solid #999;
    background: #e3dde1;
    text-align: center;
    line-height: 48px;
    cursor: pointer;
    float: left;
  }

  #form .code div {
    float: left;
    width: 15px;
    font-size: 25px;
    font-weight: bold;
  }

  #form .change {
    float: left;
    color: #2ec100;
    font-size: 12px;
    text-decoration: underline;
    margin-top: 36px;
    margin-left: 10px;
  }

  #form .change:hover {
    color: #ff9a35;
  }

  #form .code div:first-child {
    margin-left: 29px;
  }

  #form .code-input {
    margin-top: 10px;
  }

  #submit {
    margin-top: 10px;
    cursor: pointer;
  }

  #have, #same, #error {
    font-size: 13px;
    margin-left: 10px;
    color: #f00;
  }
</style>
