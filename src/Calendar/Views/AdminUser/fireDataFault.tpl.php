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
    >

    <!-- Sidebars -->


    <div class="app" >

      <!-- Navbars -->

      <div class="navbar navbar-app navbar-absolute-top">
        <div class="navbar-brand navbar-brand-center" ui-yield-to="title">
        消防故障</div>
      
        <div class="btn-group pull-right" ui-yield-to="navbarAction">
          <div ui-toggle="uiSidebarRight" class="btn">
            <i class="fa fa-comment"></i> layout
          </div>
        </div>
      </div>


      <div class="navbar navbar-app navbar-absolute-bottom">
        <div class="btn-group justified">
          <a href="http://mobileangularui.com/" class="btn btn-navbar"><i class="fa fa-home fa-navbar"></i> Docs</a>
          <a href="https://github.com/mcasimir/mobile-angular-ui" class="btn btn-navbar"><i class="fa fa-github fa-navbar"></i> Sources</a>
          <a href="https://github.com/mcasimir/mobile-angular-ui/issues" class="btn btn-navbar"><i class="fa fa-exclamation-circle fa-navbar"></i> Issues</a>
        </div>
      </div>

      <!-- App Body -->
      <div class="app-body" ng-class="{loading: loading}">
        <div ng-show="loading" class="app-content-loading">
          <i class="fa fa-spinner fa-spin loading-spinner"></i>
        </div>
        <div class="app-content">
          <ng-view></ng-view>
 

<div class="scrollable">
  <div class="scrollable-content">
    <div class='section'>
      <ui-state id='activeTab' default='1'></ui-state>

    

      <div class="btn-group justified nav-tabs">
        <a ui-set="{'activeTab': 1}" 
            ui-class="{'active': activeTab == 1}" class="btn btn-default">当天</a>

        <a ui-set="{'activeTab': 2}" 
            ui-class="{'active': activeTab == 2}" class="btn btn-default">本周</a>

        <a ui-set="{'activeTab': 3}" 
            ui-class="{'active': activeTab == 3}" class="btn btn-default">本月</a>
      </div>  
      <p></p>
              <div class="panel-group" 
        
        ui-state='myAccordion' 
        ui-default='2'>

        <div class="panel panel-default" ng-repeat="i in [1,2,3]">
          <div class="panel-heading" ui-set="{'myAccordion': i}">
        
            <h4 class="panel-title">
                Collapsible Group Item #{{i}}
            </h4>
          </div>
      
          <div ui-if="myAccordion == i" ui-scope-context='i'>
            <div class="panel-body">
              {{lorem}}
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

        </div>
      </div>

    </div><!-- ~ .app -->

    <div ui-yield-to="modals"></div>

    <script>
       (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
       (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
       })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

       ga('create', 'UA-48036416-1', 'mobileangularui.com');
       ga('send', 'pageview');
     </script>
  </body>
</html>
