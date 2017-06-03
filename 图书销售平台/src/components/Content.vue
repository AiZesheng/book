<template>
  <div id="content">
    <div class="wrapper">
      <div class="title">热销总榜</div>
      <ul class="menu" @click="chooseType">
        <li class="selected">所有书籍</li>
        <li>少儿</li>
        <li>文学</li>
        <li>小说</li>
        <li>历史</li>
        <li>外语</li>
        <li>经济管理</li>
      </ul>
      <ul class="main">
        <li v-for="x in books">
          <router-link :to='{name:"bookmes", params:{bookId: x.book_id}}'>
            <img :src=x.book_img alt="">
            <div class="bookname">{{x.book_name}}</div>
            <div class="money">￥{{x.book_price}}</div>
            <div class="star">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half"></i>
            </div>
            <div class="describe">中文图书自营全场，满200元减18元</div>
          </router-link>
        </li>
      </ul>
      <div class="title" style="border-top: 2px solid #ddd;padding-top: 20px;">今日推荐</div>
      <ul class="main">
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
        <li>
          <img src="../../static/img/宝宝第一套好性格养成书.jpg" alt="">
          <div class="bookname">宝宝第一套好性格养成书</div>
          <div class="money">￥13.80</div>
          <div class="star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
          </div>
          <div class="describe">中文图书自营全场，满200元减18元</div>
        </li>
      </ul>
    </div>
  </div>
</template>
<script type="text/ecmascript-6">
  export default{
    data(){
      return {
        books: ""
      };
    },
    methods: {
      chooseType(e){
        let target = e.target;
        if (target.nodeName == "LI") {
          $(target).addClass("selected").siblings().removeClass("selected");
          if (target.innerHTML != "所有书籍") {
            this.$http.jsonp('http://localhost/book_php/user/get_by_booktype', {
              params: {
                book_type: target.innerHTML
              }
            }, {
              jsonp: "callback"
            }).then((res) => {
              this.books = res.data;
            });
          } else {  // 当点所有书籍时调get_all接口
            this.$http.jsonp('http://localhost/book_php/user/get_all', {
              params: {}
            }, {
              jsonp: "callback"
            }).then((res) => {
              this.books = res.data;
            });
          }
        }
      }
    },
    created(){
      this.$http.jsonp('http://localhost/book_php/user/get_all', {
        params: {}
      }, {
        jsonp: "callback"
      }).then((res) => {
        this.books = res.data;
      });
    }
  }
</script>
<style>
  #content {
    padding: 40px 0 10px 0;
  }

  #content .wrapper {
    width: 1200px;
    margin: 0 auto;
  }

  #content .title {
    text-align: center;
    font-weight: bold;
    font-size: 25px;
  }

  #content .menu {
    height: 40px;
    line-height: 40px;
    border-bottom: 2px solid #ddd;
    padding-left: 25px;
  }

  #content .menu li {
    float: left;
    margin-right: 30px;
    font-size: 16px;
    cursor: pointer;
  }

  #content .menu .selected {
    color: #cf0418;
    border-bottom: 2px solid #cf0418;
    font-weight: bold;
  }

  #content .main {
    overflow: hidden;
    margin-left: 30px;
    margin-top: 25px;
  }

  #content .main li {
    height: 220px;
    width: 165px;
    float: left;
    padding: 0 12.5px 0 12.5px;
  }

  #content .main li img {
    width: 110px;
    height: 110px;
    display: block;
    margin: 0 auto;
    cursor: pointer;
  }

  #content .bookname {
    font-weight: bold;
    font-size: 15px;
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-top: 10px;
  }

  #content .money {
    color: #cf0418;
    font-size: 15px;
    margin-top: 5px;

  }

  #content .star {
    color: #ffc100;
    margin-top: 5px;

  }

  #content .describe {
    color: #999;
    font-size: 13px;
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-top: 5px;
  }
</style>
