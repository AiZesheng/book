<template>
  <div id="bookMes">
    <div class="wrapper">
      <div class="img">
        <img :src=book.book_img alt="">
      </div>
      <div class="main">
        <div class="title">{{book.book_name}}</div>
        <div class="row">
          <span class="key">价格</span><span class="price">￥{{book.book_price}}</span>
        </div>
        <div class="row">
          <span class="key">运费</span><span class="move-price">上海至 哈尔滨 快递: 15.00</span>
        </div>
        <div class="mes">
          <div>月销量 <span class="val">{{book.book_sales}}</span></div>
          <div>累积评价 <span class="val">0</span></div>
          <div style="border: none;">送购物积分 <span class="val">23</span></div>
        </div>
        <div class="row">
          <span class="key" style="float: left;line-height: 30px;">分类</span>
          <span class="book-type">{{book.book_type}}</span>
          <span class="stock">库存{{book.book_stock}}</span>
        </div>
        <div class="buy" @click="buy">立即购买</div>
        <div class="shopping-car" @click="goShoppingCar">加入购物车</div>
        <div class="serve"><span>服务承诺</span><span>正品保证</span><span>极速退款</span><span>七天无理由退换</span></div>
      </div>
    </div>
  </div>
</template>
<script type="text/ecmascript-6">
  export default{
    data(){
      return {
        book: ""
      };
    },
    methods: {
      goShoppingCar(){
        // 如果当前有登录的用户就直接跳到购物车页面
        if (this.$store.state.loginUser) {
          let path = this.$route.path;
          let bookId = path.charAt(path.length - 1);  //通过url 接到book_id
          // 把user_id存入state
          let userId = this.$store.state.loginUser.user_id;
          // 判断购物车中是否已经存在
          this.$http.jsonp('http://localhost/book_php/user/get_shoppingcar_by_bookid_userid', {
            params: {
              book_id: bookId,
              user_id: userId
            }
          }, {
            jsonp: "callback"
          }).then((res) => {
            if (res.data == 0) {  //数据库中不存在这本书
              // 更新数据库 shoppingcar表
              this.$http.jsonp('http://localhost/book_php/user/add_to_shoppingcar', {
                params: {
                  book_id: bookId,
                  user_id: userId
                }
              }, {
                jsonp: "callback"
              }).then((res) => {
                if (res.data == 1) {
                  let isQuit = confirm("添加购物车成功,是否跳到购物车页面?");
                  if (isQuit) {
                    // 跳到购物车页面
                    this.$router.push({ name: 'shoppingcar', params: { url: "http://localhost/book_php/user/get_shoppingcar" }});
                  }
                } else {
                  alert(res.data);
                }
              });
            }else{  // 购物车里有这本书就直接跳购物车页面
              let isQuit = confirm("添加购物车成功,是否跳到购物车页面?");
              if (isQuit) {
                // 跳到购物车页面
                this.$router.push({ name: 'shoppingcar', params: { url: "http://localhost/book_php/user/get_shoppingcar" }});
              }
            }
          });
        } else {  // 如果当前没有用户登录就跳到登录页面
          alert("您还没有登录");
          this.$router.push("/login");
        }
      },
      buy(){
        if (this.$store.state.loginUser) {
          let bookId = this.$route.path.charAt(this.$route.path.length - 1);  //通过url 接到book_id
          // 跳到立即购买页面
          this.$router.push({ name: 'shoppingcar', params: { url: "http://localhost/book_php/user/get_by_bookid_userid?book_id="+bookId }});
        } else {  // 没人登录就跳到登录页面
          alert("您还没有登录");
          this.$router.push("/login");
        }
      }
    },
    mounted(){
      let path = this.$route.path;
      let bookId = path.charAt(path.length - 1);  //通过url 接到book_id
      this.$http.jsonp('http://localhost/book_php/user/get_by_bookid', {
        params: {
          book_id: bookId
        }
      }, {
        jsonp: "callback"
      }).then((res) => {
        this.book = res.data;
      });
    }
  }
</script>
<style>
  #bookMes {
    padding: 15px 0 15px 0;
  }

  #bookMes .wrapper {
    width: 970px;
    margin: 0 auto;
    overflow: hidden;
  }

  #bookMes .img {
    width: 418px;
    height: 418px;
    border: 1px solid #ddd;
    line-height: 420px;
    text-align: center;
    float: left;
  }

  #bookMes .img img {
    width: 284px;
    height: 418px;
  }

  #bookMes .main {
    float: right;
    width: 530px;
    margin-left: 20px;
  }

  #bookMes .title {
    font-weight: bold;
  }

  #bookMes .price {
    font-size: 25px;
    font-weight: bold;
    color: #c40000;
  }

  #bookMes .key {
    font-size: 14px;
    font-weight: bold;
    color: #888;
    margin-right: 40px;
  }

  #bookMes .move-price {
    font-size: 14px;
  }

  #bookMes .mes {
    width: 510px;
    height: 38px;
    border-top: 1px dotted #999;
    border-bottom: 1px dotted #999;
    margin-top: 30px;
  }

  #bookMes .mes > div {
    float: left;
    width: 168px;
    text-align: center;
    line-height: 19px;
    height: 19px;
    margin-top: 10px;
    font-size: 14px;
    color: #888;
    border-right: 1px dotted #888;
  }

  #bookMes .mes .val {
    color: #c40000;
    font-weight: bolder;
  }

  #bookMes .left, #bookMes .num, #bookMes .right {
    float: left;
    border: 1px solid #999;
    height: 28px;
    width: 20px;
    margin-right: 10px;
    color: #777;
  }

  #bookMes .left, #bookMes .right {
    text-align: center;
    line-height: 28px;
  }

  #bookMes .num {
    outline: none;
    background: #eee;
    width: 50px;
    text-indent: 8px;
  }

  #bookMes .stock {
    font-size: 14px;
    color: #888;
    line-height: 30px;
    float: left;
    margin-left: 40px;
  }

  #bookMes .row {
    margin-top: 30px;
    overflow: hidden;
  }

  #bookMes .buy, #bookMes .shopping-car {
    display: inline-block;
    border: 1px solid #c40000;
    width: 180px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    cursor: pointer;
    color: #c40000;
    background: #ffeded;
    margin-top: 30px;
  }

  #bookMes .shopping-car {
    margin-left: 30px;
    color: #fff;
    background: #c40000;
  }

  #bookMes .serve {
    font-size: 14px;
    color: #888;
    margin-top: 40px;
  }

  #bookMes .serve span {
    margin-right: 40px;
  }

  #bookMes .book-type{
    float: left;
    color: #c40000;
    font-size: 13px;
    line-height: 30px;
    font-weight: bold;
  }
</style>
