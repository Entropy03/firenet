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
            '/fireData.js',
        ),
    )
);

?>
 <body 
    ng-app="firedataUI" 
    ng-controller="MainController"
    >

    <!-- Sidebars -->


    <div class="app">

      <!-- Navbars -->
      <div ng-init='lorems=<?php echo $this->data; ?>'>
      </div>

      <div class="navbar navbar-app navbar-absolute-top">
        <div class="navbar-brand navbar-brand-center" ui-yield-to="title">
        微仓订单</div>
      
        <div class="btn-group pull-right" ui-yield-to="navbarAction">
          <div ui-toggle="uiSidebarRight" class="btn">
            <a class="fa" href="/fire.php/layout">退出 </a>
          </div>
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

    
      <p></p>
              <div class="panel-group" 
        
        ui-state='myAccordion' 
        ui-default='2'>
  

        <div class="panel panel-default" ng-repeat="lorem in lorems">
          <div class="panel-heading" ui-set="{'myAccordion': {{lorem['order_no']}}}">
        
            <h4 class="panel-title">
                订单 #{{lorem.order_no}}
            </h4>
          </div>
      
          <div ui-if="myAccordion == {{lorem['order_no']}}" ui-scope-context="{{lorem['order_no']}}">
            <div class="panel-body">
            <table>
                <tr>
                   <td> <span  class="navbar-brand "><label>订单号：</label>{{lorem['order_no']}}</span></td>
               </tr>
               <tr>
                  <td> <span  class="navbar-brand "><label>时间：</label>{{lorem['order_time']}}</span></td>
                 </tr>
              <tr> 
                  <td> <span  class="navbar-brand "><label>价钱：</label>{{lorem['price']}}</span></td>
              </tr>
                <tr>
                  <td> <span  class="navbar-brand "><label>姓名：</label>{{lorem['buyer_name']}}</span></td></tr>
               <tr> 
                   <td> <span  class="navbar-brand "><label>电话：</label>{{lorem['buyer_telephone']}}</span></td>
               </tr> 
               <tr> 
                  <td> <span  class=" "><label>地址：</label>{{lorem['buyer_address']}}</span></td>
               </tr>
               <tr>
                   <td> <span  class="navbar-brand "><a class="btn btn-primary btn-block" style="{{lorem['order_statu']=='0'?'border-color:#FF8000;background-color:#FF8000':''}}"ng-click="sendOrder(lorem.order_no)">{{lorem['order_statu']=='0'?'收货':'送达'}} </a></span></td>
               </tr>

              
              </table>
         
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

   
 
  </body>
</html>
