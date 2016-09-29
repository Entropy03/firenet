
<?php
//var_dump($this);
$this->head(
    array(
        'title' => '登陆',
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
            '/login.js',

        ),
    )
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
            <i class="fa fa-comment"></i> Chat
          </div>
        </div>
      </div>
<div class="scrollable">
 <div class="scrollable-content section">
   
  <form role="form" ng-submit='login()'>
    <fieldset>
      <legend>登陆</legend>
        <div class="form-group has-success has-feedback">
          <label>用户名</label>
          <input type="username"
                 ng-model="username"
                 class="form-control"
                 placeholder="Enter email">
        </div>

        <div class="form-group">
          <label>密码</label>
          <input type="password"  
                 ng-model="password"
                 class="form-control"
                 placeholder="Password">
        </div>

        <div class="form-group">
          <label>记住我</label>
          <ui-switch 
            ng-model='rememberMe'></ui-switch>
        </div>
    </fieldset>
    <hr>

    <button class="btn btn-primary btn-block">
      登陆
    </button>

    <div ui-content-for="navbarAction">
      <a class='btn' ng-click='login()'>登录</a>
    </div>

  </form>
 </div>
</div>
  </div>
      
  </body>
</html>

