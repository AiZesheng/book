<template>
  <div id="shopping">
    <div class="wrapper">
      <div class="nav">全部商品({{bookNum}})</div>
      <div class="hr"></div>
      <div class="key">
        <input type="checkbox" class="checkbox" id="all" v-model="all" @click="isAll">
        <a href="javascript:;" style="color: #666;"><label for="all" class="all">全选</label></a>
        <span>商品信息</span>
        <ul>
          <li>单价</li>
          <li>数量</li>
          <li>金额</li>
          <li>操作</li>
        </ul>
      </div>
      <div class="content">
        <div class="content-top">
          <span>68部分包邮</span>
          <div>满88元,享部分地区包邮</div>
        </div>
        <div class="content-list" v-for="x in books">
          <v-operate :books='x' ref="child"></v-operate>
        </div>
        <div class="content-bottom">
          <div>再买44.60元，“满68.00元享部分地区包邮”</div>
        </div>
      </div>
      <div class="pay">
        <div style="float: right;">
          <span>合计&nbsp;&nbsp;(不含运费)&nbsp;&nbsp;:&nbsp;&nbsp;</span>
          <span class="total">{{this.$store.state.total | toFixed}}</span>
          <div id="pay" v-if="this.$store.state.total > 0" class="active" @click="pay">结&nbsp;算</div>
          <div id="pay" v-else>结&nbsp;算</div>
        </div>
      </div>
    </div>
  </div>
</template>
<script type="text/ecmascript-6">
  import Operate from "./Operate.vue";
  export default{
    data(){
      return {
        books: "",
        all: false,
        bookNum: 0
      };
    },
    filters: {
      toFixed: function (value) {  
        return value.toFixed(2);
      }
    },
    mounted(){
      this.$store.state.total = 0;
      let userId = this.$store.state.loginUser.user_id;
      this.$http.jsonp(this.$route.params.url, {
        params: {
          user_id: userId
        }
      }, {
        jsonp: "callback"
      }).then((res) => {
        if(res.data != 0){
          this.books = res.data;
          this.bookNum = res.data.length;
        }else{
          $('#shopping .content').html();
        }
      });
    },
    methods: {
      isAll(){
        let child = this.$refs.child;
        if(this.all){ // 如果被全选
          this.$store.state.total = 0;
          for(let i=0; i<child.length; i++){
            child[i].$emit("checked");
          }
        }else{  //全不选
          for(let i=0; i<child.length; i++){
            child[i].$emit("noChecked");
          }
          this.$store.state.total = 0;
        }
      },
      pay(){
        let child = this.$refs.child;
        let userId = this.$store.state.loginUser.user_id;
        // 把购买的商品添加到数据库
        for(let i=0; i<child.length; i++){
          this.$http.jsonp("http://localhost/book_php/user/add_to_order", {
            params: {
              user_id: userId,
              order_total_price: child[i].price,
              book_num: child[i].bookNum,
              book_id: this.books[i].book_id
            }
          }, {
            jsonp: "callback"
          }).then((res) => {
            if(res.data){
              // 跳转到订单页
              this.$router.push("/order");
            }else{
              alert("购买失败");
            }
          });
        }
      }
    },
    components: {
      "v-operate": Operate
    }
  }
</script>
<style>
  #shopping .wrapper{
    width: 980px;
    margin: 0 auto;
  }
  #shopping .nav{
    font-size: 18px;
    color: #f40;
  }
  #shopping .hr{
    margin-top: 10px;
    width: 100%;
    height: 3px;
    background: #e6e6e6;
  }
  #shopping .content{
    border: 1px solid #ccc;
  }
  #shopping .content-top{
    height: 38px;
    font-size: 12px;
    color: #666;
  }
  #shopping .content-top span{
    float: left;
    background: #e7e7e7;
    padding: 5px;
    margin: 5px 0 0 48px;
  }
  #shopping .content-top div{
    float: left;
    height: 38px;
    line-height: 38px;
    margin-left: 13px;
  }
  #shopping .content-list{
    background: #ececec;
    padding: 20px 0 20px 0;
    overflow: hidden;
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
  }
  #shopping .checkbox{
    float: left;
    margin-left: 20px;
  }
  #shopping .content-bottom{
    color: #000;
    height: 30px;
    line-height: 30px;
    font-size: 12px;
  }
  #shopping .content-bottom div{
    float: right;
    margin-right: 20px;
  }
  #shopping .book-img{
    width: 80px;
    height: 80px;
    margin-left: 12px;
    float: left;
    cursor: pointer;
  }
  #shopping .book-name{
    float: left;
    width: 200px;
    font-size: 12px;
    color: #3c3c3c;
    margin-left: 10px;
    line-height: 15px;
    height: 30px;
    overflow: hidden;
    cursor: pointer;
  }
  #shopping .book-name:hover{
    text-decoration: underline;
    color: #f40;
  }
  #shopping .seven{
    width: 60px;
    height: 20px;
    float: left;
    position: absolute;
    left: 10px;
    bottom: 0;
  }
  #shopping .book-mes{
    height: 80px;
    overflow: hidden;
    position: relative;
    float: left;
  }
  #shopping .operate{
    float: right;
  }
  #shopping .operate li{
    float: left;
    width: 120px;
    text-align: center;
  }
  #shopping .sup,#shopping .add,#shopping .num{
    float: left;
    border: 1px solid #999;
    font-size: 12px;
    margin-left: 5px;
    height: 19px;
  }
  #shopping .sup,#shopping .add{
    width: 20px;
    text-align: center;
  }
  #shopping .sup{
    margin-left: 15px;
  }
  #shopping .num{
    width: 40px;
    text-align: center;
    outline: none;
    background: transparent;
  }
  #shopping .total-price, #shopping .price{
    font-weight: bold;
    font-size: 13px;
  }
  #shopping .total-price{
    color: #f40;
  }
  #shopping .delete{
    font-size: 12px;
  }
  #shopping .delete a:hover{
    color: #f40;
  }
  #shopping .all{
    cursor: pointer;
    margin-left: 10px;
  }
  #shopping .key{
    height: 50px;
    line-height: 50px;
    color: #666;
  }
  #shopping .key input, #shopping .key span, #shopping .key .all{
    float: left;
    font-size: 12px;
  }
  #shopping .key span{
    margin-left: 70px;
  }
  #shopping ul{
    float: right;
    font-size: 12px;
  }
  #shopping ul li{
    float: left;
    width: 120px;
    text-align: center;
  }
  #all{
    margin-top: 19px;
  }
  #shopping .pay{
    height: 50px;
    line-height: 50px;
    background: #e5e5e5;
    margin-top: 15px;
  }
  #shopping .pay span, #pay{
    float: left;
    color: #666;
    font-size: 12px;
  }
  #shopping .pay .total{
    color: #f40;
    font-size: 25px;
  }
  #pay{
    width: 120px;
    text-align: center;
    background: #b0b0b0;
    color: #fff;
    font-size: 20px;
    margin-left: 10px;
  }
  #shopping .pay .active{
    background: #f40;
    cursor: pointer;
  }
</style>
