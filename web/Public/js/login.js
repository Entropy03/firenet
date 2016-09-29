//
// Here is how to define your module
// has dependent on mobile-angular-ui
//
var app = angular.module('MobileAngularUiExamples', [
  'ngRoute',
  'mobile-angular-ui',

  // touch/drag feature: this is from 'mobile-angular-ui.gestures.js'
  // it is at a very beginning stage, so please be careful if you like to use
  // in production. This is intended to provide a flexible, integrated and and
  // easy to use alternative to other 3rd party libs like hammer.js, with the
  // final pourpose to integrate gestures into default ui interactions like
  // opening sidebars, turning switches on/off ..
  'mobile-angular-ui.gestures'
]);

app.run(function($transform) {
  window.$transform = $transform;
});

//
// You can configure ngRoute as always, but to take advantage of SharedState location
// feature (i.e. close sidebar on backbutton) you should setup 'reloadOnSearch: false'
// in order to avoid unwanted routing.
//
app.config(function($routeProvider) {

});



//
// For this trivial demo we have just a unique MainController
// for everything
//
app.controller('MainController', function($rootScope, $scope){


  //
  // 'Forms' screen
  //
  $scope.rememberMe = true;
  $scope.username = '';

  $scope.login = function() {
    var data = {
        'username': $scope.username,
        'password': $scope.password,
        'rememberMe': $scope.rememberMe
    };
    if(data.username == ''|| data.username== undefined){
       alert("请输入用户");
       return false;
    }
     if(data.password == ''|| data.password== undefined){
       alert("请输入密码");
       return false;
    }
    $.post('/fire.php/submitLogin', data, function(data) {

        switch (data) {
            case 1:
                window.location.href = '/fire.php/index';
                break;
            case 2:
                alert("登录失败");
                break;
            case 3:
                alert("用户密码错误");
                break;
            case 4:
                alert("当前已经录");
                break;
            case 5:
                alert("用户未审核");
                break;
            default:
                alert("未知错误");
        }

    }, 'json');

};





});
