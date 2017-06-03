<template>
  <div id="content">
    <div class="wrapper">
      <ul class="menu">
        <li class="selected">查询结果</li>
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
    </div>
  </div>
</template>
<script>
	export default{
    data(){
      return {
        books: ""
      };
    },
    mounted(){
      this.$http.jsonp("http://localhost/book_php/user/search", {
        params: {
          keywords: this.$route.params.keywords
        }
      }, {
        jsonp: "callback"
      }).then((res) => {
        if(res.data != 0){
          console.log(res.data);
          this.books = res.data;
        }else{
          alert("啥也没有！");
        }
      });
    }
	}
</script>
<style>
	
</style>