//
// Here is how to define your module
// has dependent on mobile-angular-ui
//
var app = angular.module('firedataUI', [
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

var data = $('#firedata').val();

//
// For this trivial demo we have just a unique MainController
// for everything
//
app.controller('MainController', function($rootScope, $scope){


$scope.sendOrder = function(id){
 var data = {
        'id': id,
    };
 $.post('/fire.php/updateOrder', data, function(data) {

        switch (data) {
            case 1:
                window.location.href = '/fire.php/index';
                break;
            case '-1':
                window.location.href = '/fire.php/login';

            default:
                alert("更改失败");
        }

    }, 'json');

//  alert(id)
}
  

});
