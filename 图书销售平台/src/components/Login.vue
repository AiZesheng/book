<template>
  <div id="login">
    <div class="wrapper">
      <div id="header">
        <img class="card" src="../../static/img/card.png" alt="">
        <div class="title">登录通行证</div>
      </div>
      <div class="hr"></div>
      <div style="overflow: hidden;">
        <div id="form">
          <table>
            <tr>
              <td>用户名</td>
              <td><input type="text" placeholder="请输入用户名" v-model="username"></td>
            </tr>
            <tr>
              <td>密<span style="opacity: 0;">户</span>码</td>
              <td>
                <input type="password" id="password" placeholder="请输入密码" v-model="password"><br>
                <a href="javascript:;" id="cookie">
                  <input style="width: 20px;float: left;margin-top: 7px;" type="checkbox" value="remember" id="remember"
                         checked="checked">
                  <label for="remember" style="display:inline-block;float: left;height: 20px;">记住我</label>
                </a>
                <div id="submit">登 录</div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default{
    data(){
      return {
        username: "",
        password: ""
      };
    },
    mounted(){
      let oSubmit = document.getElementById("submit");
      let that = this;
      oSubmit.onclick = function () {
        that.$http.jsonp('http://localhost/book_php/user/login', {
          params: {
            username: that.username,
            password: that.password
          }
        }, {jsonp: 'callback'}).then(function (res) {
          if (res.data == 0) {
            alert("用户名或密码错误");
          } else {
            // 把登录的用户存入cookie
            let str = JSON.stringify(res.data);
            $.cookie('loginUser', str, {expires: 7});
            this.$store.state.loginUser = res.data;
            history.go(-1);
          }
        }, function (res) {
          console.log(res.status);
        });
      };
    }
  }
</script>
<style>
  #login .wrapper {
    width: 800px;
    margin: 0 auto;
    overflow: hidden;
  }

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

  #form {
    border: 1px solid #ccc;
    float: left;
    padding: 35px 60px 40px 60px;
    border-radius: 5px;
    -webkit-box-shadow: 0 0 5px #ccc;
    -moz-box-shadow: 0 0 5px #ccc;
    box-shadow: 0 0 5px #ccc;
    margin-top: 50px;
    background: linear-gradient(#fff, #eee);
  }

  #form input:not(#remember) {
    width: 200px;
    height: 20px;
    border: 1px solid #999;
    text-indent: 5px;
    outline: none;
  }

  #form input:not(#remember):focus {
    border-color: #2aa0ff;
  }

  #form td {
    padding-top: 20px;
  }

  #form tr td:first-child {
    font-size: 15px;
    font-weight: bold;
    vertical-align: top;
    line-height: 22px;
    padding-right: 10px;
  }

  #form label {
    font-size: 12px;
    margin-left: 7px;
  }

  #password {
    margin-bottom: 8px;
  }

  #cookie {
    display: block;
    height: 30px;
    line-height: 30px;
  }

  #submit {
    font-size: 16px;
    color: #fff;
    background: linear-gradient(#b2d687, #6bb043);
    width: 88px;
    height: 39px;
    line-height: 39px;
    text-align: center;
    border-radius: 5px;
    cursor: pointer;
    margin: 15px 0 0 10px;
    box-shadow: 0 0 3px #6bb043;
  }
</style>
