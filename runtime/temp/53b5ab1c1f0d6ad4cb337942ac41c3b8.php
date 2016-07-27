<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/home/yqj/project/easytrader/H5/tp5/public/../application/mobile/view/user/register.html";i:1467849407;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>我的生活</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">

  </head>
  <body>
    <div class="page-group">
        <div class="page page-current">
    <header class="bar bar-nav">
        <h1 class='title'>用户注册</h1>
    </header>
        <div class="content">
          <div class="list-block">
            <ul>
              <!-- Text inputs -->
              <li>
                <div class="item-content">
                  <div class="item-media"><i class="icon icon-phone"></i></div>
                  <div class="item-inner">
                    <div class="item-title label">手机</div>
                    <div class="item-input">
                      <input type="text" id = 'phone' placeholder="手机">
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="item-content">
                  <div class="item-media"><i class="icon icon-code"></i></div>
                  <div class="item-inner">
                    <div class="item-title label">密码</div>
                    <div class="item-input">
                      <input type="email" placeholder="密码">
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="content-block">
            <div class="row">
              <div class="col-50"><a href="#" class="button button-big button-fill button-danger">获取密码</a></div>
              <div class="col-50"><a href="#" class="button button-big button-fill button-success">用户注册</a></div>
            </div>
          </div>
        </div>
        </div>
    </div>

    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
    <script>
       Zepto(document).on('click','.button-danger', function () {
             var phone  = Zepto('#phone').val();
             Zepto.getJSON('/index.php/mobile/index/getcode/phone/'+phone,function(response){
                alert(response.data);
                
             });
        });
    </script>

  </body>
</html>