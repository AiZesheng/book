<template>
  <div id="buy">
    <div class="wrapper">
      <div class="title">确认收货地址</div>
      <div style="overflow: hidden;">
        <div class="address">上海市 浦东新区 亮秀路112号</div>
      </div>
      <div class="title">订单确认信息</div>
    </div>
  </div>
</template>
<script>
  export default{

  }
</script>
<style>
  #buy .title{
    line-height: 25px;
    color: #333;
    font-weight: 700;
    font-size: 14px;
    padding-bottom: 10px;
  }
  #buy .wrapper{
    width: 980px;
    margin: 0 auto;
  }
  #buy .address{
    color: #666;
    border: 1px solid #999;
    float: left;
    font-size: 13px;
    border-radius: 3px;
    padding: 5px;
  }
</style>
