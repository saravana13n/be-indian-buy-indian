$.mobile.linkBindingEnabled = false;
$.mobile.hashListeningEnabled = false;
var ngApp = angular.module('app', ['ngRoute']);
ngApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/download', {
        templateUrl: 'download.html',
      }).
      when('/view/:id', {
        templateUrl: 'view.html',
        controller: 'viewController'
      }).
      when('/list', {
          templateUrl: 'list.html',
          controller: 'listController'
      }).
      otherwise({
        redirectTo: '/list'
      });
  }]);


ngApp.directive('jqm', function($timeout) {
  return {
    link: function(scope, elm, attr) {
        $timeout(function(){
            elm.trigger('create');
        });
    }
  };
});
