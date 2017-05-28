<template>
  <div id="footer">
    <div class="wrapper">
      <div id="footer-top">
        <img style="float: left;" src="../../static/img/二维码.jpg" alt="图片">
        <ul class="list">
          <li style="color: #000;font-weight: bold;">英雄，我们在这里等你</li>
          <li>扫描下载《英雄联盟》官方APP</li>
          <li>获取最新最全的官方动态</li>
        </ul>
        <ul style="margin-left: 70px;" class="list">
          <li style="color: #000;font-weight: bold;">温馨提示：本游戏适合18岁(含)以上玩家娱乐</li>
          <li>抵制不良游戏 拒绝盗版游戏 注意自我保护 谨防受骗上当</li>
          <li>适度游戏益脑 沉迷游戏伤身 合理安排时间 享受健康生活</li>
        </ul>
      </div>
      <div id="footer-down">
        <a href="javascript:;"><img style="margin-top: 10px;float: left;" src="../../static/img/腾讯.jpg" alt="图片"></a>
        <div id="footer-right">
          <ul>
            <li><a href="javascript:;">腾讯互动娱乐</a><span>|</span></li>
            <li><a href="javascript:;">服务条款</a><span>|</span></li>
            <li><a href="javascript:;">广告服务</a><span>|</span></li>
            <li><a href="javascript:;">腾讯游戏招聘</a><span>|</span></li>
            <li><a href="javascript:;">腾讯游戏客服</a><span>|</span></li>
            <li><a href="javascript:;">游戏活动</a><span>|</span></li>
            <li><a href="javascript:;">游戏地图</a><span>|</span></li>
            <li><a href="javascript:;">商务合作</a><span>|</span></li>
            <li><a href="javascript:;">腾讯网</a><span>|</span></li>
            <li><a href="javascript:;">网站导航</a></li>
          </ul>
          <p>
            COPYRIGHT © 1998 - 2016 TENCENT. ALL RIGHTS RESERVED. <br>
            © 2012 Riot Games, Inc. ALL RIGHTS RESERVED.<br>
            文网进字[2011] 004号 & ISBN <br>978-7-89989-145-2|新出网证（粤）字010号|粤网文[2014]0633-233号
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default{}
</script>
<style>
  #footer{
    background: #f8f8f8;
    height: 260px;
  }
  #footer-top{
    height: 85px;
    border-bottom: 3px solid #d0d0d0;
  }
  .list{
    float: left;
  }
  .list li{
    font-size: 12px;
    height: 25px;
    line-height: 25px;
    margin-left: 20px;
    color: #a5a5a5;
  }
  #footer-right{
    float: right;
    width: 660px;
    height: 120px;
  }
  #footer-right ul li{
    float: left;
    font-size: 12px;
    margin-top: 20px;
    margin-bottom: 5px;
  }
  #footer-right ul li span{
    margin-left: 3px;
    margin-right: 3px;
    color: #666;
  }
  #footer-right ul li a{
    color: #666;
  }
  #footer-right ul li a:hover{
    text-decoration: underline;
  }
  #footer-right p{
    color: #666;
    font-size: 12px;
    line-height: 18px;
  }
  #footer .wrapper{
    width: 980px;
    margin: 0 auto;
    overflow: hidden;
    padding-top: 50px;
  }
</style>
