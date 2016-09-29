<?php
//var_dump($this);
$this->head(
    array(
        'title' => '注册',
        'css' => array(
            '/dist/css/mobile-angular-ui-base.min.css',
            '/dist/css/mobile-angular-ui-hover.min.css',
            '/dist/css/mobile-angular-ui-desktop.min.css',
        ),
        'js' => array(
            '/jquery.min.js',
            '/dist/angular.min.js',
            '/dist/angular-route.min.js',
            '/dist/mobile-angular-ui.min.js',
            '/dist/mobile-angular-ui.gestures.min.js',
            '/register.js',

        ))
);

?>
 <body
    ng-app="MobileAngularUiExamples"
    ng-controller="MainController"
    ui-prevent-touchmove-defaults
    >


    <div class="app" >

      <!-- Navbars -->

      <div class="navbar navbar-app navbar-absolute-top">
        <div class="navbar-brand navbar-brand-center" ui-yield-to="title">
          微仓
        </div>
        <div class="btn-group pull-left">
          <div ui-toggle="" class="btn sidebar-toggle">
            <i class="fa fa-bars"></i> 菜单
          </div>
        </div>
        <div class="btn-group pull-right" ui-yield-to="navbarAction">
          <div ui-toggle="" class="btn">
            <i class="fa fa-comment"></i> 登出
          </div>
        </div>
      </div>
<div class="scrollable">
 <div class="scrollable-content section">

  <form role="form" ng-submit='register()'>
    <fieldset>
      <legend>注册</legend>
        <div class="form-group has-success has-feedback">
          <label>用户名:</label>
          <input type="username"
                 ng-model="username"
                 class="form-control"
                 placeholder="输入用户名">
        </div>

        <div class="form-group">
          <label>密码：</label>
          <input type="password"
                 ng-model="password"
                 class="form-control"
                 placeholder="*********">
        </div>

        <div class="form-group">
          <label>重复密码：</label>
          <input type="password"
                 ng-model="repassword"
                 class="form-control"
                 placeholder="*********">
        </div>
        <div class="form-group ">
          <label>手机号:</label>
          <input type="phone"
                 ng-model="phone"
                 class="form-control"
                 placeholder="请输入手机号">
        </div>
        <div class="form-group">
          <label>车牌号:</label>
          <input type="freshcar"
                 ng-model="freshcar"
                 class="form-control"
                 placeholder="请输入车牌号多个车牌以“,”分割">
        </div>
  </fieldset>
    <hr>

    <button class="btn btn-primary btn-block">
      注册
    </button>

    <div ui-content-for="navbarAction">
      <a class='btn' ng-click='register()'>register</a>
    </div>

  </form>
 </div>
</div>
  </div>

  </body>
</html>
