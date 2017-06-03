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
        <input type="text" class="num" v-model="bookNum" @keyup="changePrice">
        <a href="javascript:;" class="add" @click="add">+</a>
      </li>
      <li class="total-price">￥{{price | toFixed}}</li>
      <li class="delete" @click="deleteBook"><a href="javascript:;">删除</a></li>
    </ul>
  </div>
</template>
<script>
  import {mapState, mapMutations} from "vuex";
  export default{
    props: ['books'],
    computed: mapState([
      "total"
    ]),
    data(){
      return {
        bookNum: 1,
        price: this.books.book_price,
        isChecked: false
      };
    },
    created(){
      this.price = parseFloat(this.price);
    },
    filters: {
      toFixed: function (value) {  
        return value.toFixed(2);
      }
    },
    methods: {
      ...mapMutations([
        "addPrice",
        "supPrice",
        "resetPrice"
      ]),
      sup(){
        if(this.bookNum > 1){
          this.bookNum--;
          this.books.book_price = parseFloat(this.books.book_price);
          this.price = this.bookNum * this.books.book_price;
          if(this.isChecked){
            this.supPrice(this.books.book_price);
          }
        }
      },
      add(){
        this.bookNum++;
        this.books.book_price = parseFloat(this.books.book_price);
        this.price = this.bookNum * this.books.book_price;
        if(this.isChecked){
          this.addPrice(this.books.book_price);
        }
      },
      checked(){
        if(this.isChecked){
          this.addPrice(this.price);
        }else{
          this.supPrice(this.price);
        }
      },
      deleteBook(){
        this.$http.jsonp("http://localhost/book_php/user/delete_in_shoppingcar", {
          params: {
            user_id: this.$store.state.loginUser.user_id,
            book_id: this.books.book_id
          }
        }, {
          jsonp: "callback"
        }).then((res) => {
          if(res.data){
            console.log(res.data);
          }else{
            alert("error");
          }
        });
      },
      changePrice(){
        this.price = this.bookNum * this.books.book_price;
      }
    },
    mounted(){
      this.$nextTick(function () {
        this.$on('checked', function () {
          this.isChecked = true;
          let p = parseFloat(this.price);
          this.addPrice(p);
        });
        this.$on('noChecked', function () {
          this.isChecked = false;
        });
      });
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
