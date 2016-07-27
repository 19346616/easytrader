<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/home/yqj/project/easytrader/H5/tp5/public/../application/mobile/view/index/mlogin.html";i:1468278152;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>用户登录</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
  </head>
  <body>
       <div class="page-group">
        <!-- 单个page ,第一个.page默认被展示-->
        <div class="page">

        <header class="bar bar-nav">
          <h1 class='title'>用户登录</h1>
        </header>
            <div class="content">
              <div class="list-block">
                <ul>
                  <!-- Text inputs -->
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-name"></i></div>
                      <div class="item-inner">
                        <div class="item-title label">用户</div>
                        <div class="item-input">
                          <input type="text" id="userid" placeholder="用户">
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="item-content">
                      <div class="item-media"><i class="icon icon-form-password"></i></div>
                      <div class="item-inner">
                        <div class="item-title label">密码</div>
                        <div class="item-input">
                          <input type="password" id="passwd" placeholder="密码" class="">
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="content-block">
                <div class="row">
                  <div class="col-50"><a href="register" class="button button-big">注册</a></div>
                  <div class="col-50"><a href="#" class="button button-big button-fill">登录</a></div>
                </div>
              </div>
            </div>

      </div>
    </div>
    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
    <script>$.init()</script>
    <script>
         Zepto(document).on('click','.button-fill', function () {
             var userid  = Zepto('#userid').val();
             var passwd  = Zepto('#passwd').val();
             window.location.href =  'auth/userid/'+userid+'/passwd/'+passwd;
             
        });
         
    </script>
  </body>
</html>