<template>
	<div id="order">
		<div class="wrapper">
			<div class="title">已买到的书籍(0)</div>
			<table>
        <tr class="thead">
          <td width="8%">书籍图片</td>
          <td width="200">书名</td>
          <td>订单号</td>
          <td>单价</td>
          <td>购买数量</td>
          <td>实付款</td>
          <td>购买时间</td>
        </tr>   
        <tr v-for="x in order">
          <td><img :src="x.book_img" alt="" class="book-img"></td>
          <td class="book-name">{{x.book_name}}</td>
          <td>{{x.order_id}}</td>
          <td>￥{{x.book_price}}</td>
          <td>{{x.book_num}}</td>
          <td>￥{{x.order_total_price}}</td>
          <td>{{x.order_time}}</td>
        </tr>
      </table>
		</div>
	</div>
</template>
<script>
	export default{
    data(){
      return {
        order: ""
      };
    },
    mounted(){
      this.$http.jsonp('http://localhost/book_php/user/get_order', {
        params: {
          user_id: this.$store.state.loginUser.user_id
        }
      }, {
        jsonp: "callback"
      }).then((res) => {
        this.order = res.data;
      });
    }
	}
</script>
<style>
  #order .wrapper{
    width: 980px;
    margin: 0 auto;
  }
  #order .title{
    font-size: 16px;
    font-weight: 700;
    border-bottom: 3px solid #ddd;
    color: #f40;
    line-height: 40px;
  }
  #order table{
    margin-top: 10px;
  }
  #order .book-img{
    width: 80px;
    height: 80px;
  }
  #order td{
    text-align: center;
    font-size: 12px;
    padding: 10px;
  }
  #order .thead{
    background: #eee;
  }
  #order .book-name{
    text-align: left;
  }
</style>