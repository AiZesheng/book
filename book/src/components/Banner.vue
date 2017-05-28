<template>
  <div id="banner">
    <div class="wrapper">
      <div class="imgs">
        <img class="show" src="../../static/img/banner_01.jpg" alt="">
        <img src="../../static/img/banner_02.jpg" alt="">
        <img src="../../static/img/banner_03.jpg" alt="">
        <img src="../../static/img/banner_04.jpg" alt="">
        <img src="../../static/img/banner_05.jpg" alt="">
        <img src="../../static/img/banner_06.jpg" alt="">
        <img src="../../static/img/banner_07.jpg" alt="">
        <img src="../../static/img/banner_08.jpg" alt="">
      </div>
      <ul class="btns">
        <li class="selected">
          <span>畅销书走心推荐</span>
          <br>
          <span>满300元减100元</span>
        </li>
        <li>
          <span>全场自营中文图书</span>
          <br>
          <span>满200元减50元</span>
        </li>
        <li>
          <span>4月图书排行榜</span>
          <br>
          <span>学府书城权威推荐</span>
        </li>
        <li>
          <span>全场中文图书</span>
          <br>
          <span>满99元包邮</span>
        </li>
        <li>
          <span>顶级架构师</span>
          <br>
          <span>艾泽生</span>
        </li>
        <li>
          <span>新华文轩</span>
          <br>
          <span>赠超值童书</span>
        </li>
        <li>
          <span>畅销好书与你共读</span>
          <br>
          <span>满500元减200元</span>
        </li>
        <li>
          <span>Vuejs2.0</span>
          <br>
          <span>生哥带你爬坑</span>
        </li>
      </ul>
      <div class="arrows">
        <i class="fa fa-angle-left"></i>
        <i class="fa fa-angle-right"></i>
      </div>
    </div>
  </div>
</template>
<script>
  export default{
    mounted(){  //组件渲染完执行
      let aLi = document.querySelectorAll(".btns li");
      let aImg = document.querySelectorAll(".imgs img");
      let oldLi = aLi[0];
      let oldImg = aImg[0];
      let idx = 0;
      for(let i=0; i<aLi.length; i++){
        aLi[i].onclick = function(){
          changeImg(i);
          idx = i;
        };
      }
      let aBtn = document.querySelectorAll(".arrows i");
      aBtn[0].onclick = function(){
        idx--;
        if(idx == -1){
          idx = aLi.length-1;
        }
        changeImg(idx);
      };
      aBtn[1].onclick = function(){
        idx++;
        if(idx == aLi.length){
          idx = 0;
        }
        changeImg(idx);
      };
      let timer = setInterval(function(){
        aBtn[1].onclick();
      }, 4000);
      let oBanner = document.querySelector("#banner");
      oBanner.onmouseover = function(){
        clearInterval(timer);
      };
      oBanner.onmouseout = function(){
        timer = setInterval(function(){
          aBtn[1].onclick();
        }, 4000);
      };
      function changeImg(idx){
        aLi[idx].className = "selected";
        oldLi.className = "";
        oldLi = aLi[idx];
        aImg[idx].className = "show";
        oldImg.className = "";
        oldImg = aImg[idx];
      }
    }
  };
</script>
<style>
  #banner{
    height: 300px;
  }
  #banner .wrapper{
    height: 100%;
    width: 1200px;
    margin: 0 auto;
    position: relative;
    overflow: hidden;
  }
  #banner img{
    width: 1200px;
    height: 300px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
  }
  #banner .imgs .show{
    opacity: 1;
  }
  #banner .btns{
    height: 48px;
    width: 1200px;
    display: -webkit-box;
    display: -moz-box;
    display: box;
    position: absolute;
    bottom: -42px;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
  }
  #banner .btns li{
    -webkit-box-flex: 1;
    -moz-box-flex: 1;
    text-align: center;
    height: 48px;
    line-height: 24px;
    font-size: 12px;
    font-weight: bold;
    background: rgba(0,0,0,0.6);
    color: #fff;
    cursor: pointer;
    margin-left: 1px;
  }
  #banner .btns li:first-child{
    margin-left: 0px;
  }
  #banner .btns .selected{
    background: #ff8c00;
  }
  #banner .wrapper:hover .btns{
    bottom: 0;
  }
  #banner .arrows i{
    position: absolute;
    font-size: 50px;
    top: 50%;
    margin-top: -25px;
    width: 50px;
    text-align: center;
    cursor: pointer;
    color: rgba(0,0,0,0.6);
  }
  #banner .arrows .fa-angle-left{
    left: 0px;
  }
  #banner .arrows .fa-angle-right{
    right: 0px;
  }
</style>
