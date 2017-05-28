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
    methods: {
      ...mapMutations([
        "addPrice",
        "supPrice",
        "resetPrice"
      ]),
      sup(){
        if(this.bookNum > 1){
          this.bookNum--;
          this.price = this.bookNum * this.books.book_price;
          this.price = this.price.toFixed(2);
          if(this.isChecked){
            let p = parseFloat(this.books.book_price);
            this.supPrice(p);
          }
        }
      },
      add(){
        this.bookNum++;
        this.price = this.bookNum * this.books.book_price;
        this.price = this.price.toFixed(2);
        if(this.isChecked){
          let p = parseFloat(this.books.book_price);
          this.addPrice(p);
        }
      },
      checked(){
        if(this.isChecked){
          let p = parseFloat(this.price);
          this.addPrice(p);
        }else{
          let p = parseFloat(this.price);
          this.supPrice(p);
        }
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
      })
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
