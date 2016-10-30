'use strict';

angular.module('myApp.view', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view', {
    templateUrl: 'view/view.html',
    controller: 'TodoController'
  });
}])

.controller('TodoController', [function() {
  
  this.deleteTodo = function(id) {
    console.log('delete id ', id);
  }

  this.todos = [{
    id: 1,
    name: 'Todo 1',
    isDone: true
  }, {
    id: 2,
    name: 'Todo 2',
    isDone: false
  }];
}])

.directive('filterBar', function() {
 return {
   restrict: 'E',
   templateUrl: 'directives/filterBar.html'
 };
})