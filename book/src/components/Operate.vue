<template>
  <div>
    <input type="checkbox" class="checkbox" v-model="isChecked" @click="checked">
    <img class="book-img" :src=books.book_img alt="">
    <div class="book-mes">
      <router-link :to='{name:"bookmes", params:{bookId: books.book_id}}'><div class="book-name">{{books.book_name}}</div></router-link>
      <img class="seven" src="../../static/img/7天质量保证.png" alt="">
    </div>
    <ul class="operate">
      <li class="price">￥{{books.book_price}}</li>
      <li>
        <a href="javascript:;" class="sup" @click="sup">-</a>
        <input type="text" class="num" v-model="bookNum">
        <a href="javascript:;" class="add" @click="add">+</a>
      </li>
      <li class="total-price">￥{{price}}</li>
      <li class="delete"><a href="javascript:;">删除</a></li>
    </ul>
  </div>
</template>
<script>
  export default{
    props: ['books'],
    data(){
      return {
        bookNum: 1,
        price: this.books.book_price,
        isChecked: false
      };
    },
    methods: {
      sup(){
        if(this.bookNum > 1){
          this.bookNum--;
          this.price = this.bookNum * this.books.book_price;
          this.price = this.price.toFixed(2);
          if(this.isChecked){
            console.log(this.price);
          }
        }
      },
      add(){
        this.bookNum++;
        this.price = this.bookNum * this.books.book_price;
        this.price = this.price.toFixed(2);
        if(this.isChecked){
          console.log(this.price);
        }
      },
      checked(){
        if(this.isChecked){
          console.log(this.price);
        }
      }
    }
  }
</script>
<style>
  .sup, .add, .num{
    float: left;
    border: 1px solid #999;
    font-size: 12px;
    margin-left: 5px;
    height: 19px;
  }
  .sup, .add{
    width: 20px;
    text-align: center;
  }
  .sup{
    margin-left: 15px;
  }
  .num{
    width: 40px;
    text-align: center;
    outline: none;
    background: transparent;
  }
</style>
