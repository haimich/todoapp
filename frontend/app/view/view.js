'use strict';

angular.module('myApp.view', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view', {
    templateUrl: 'view/view.html',
    controller: 'TodoController'
  })
}])

.controller('TodoController', [ '$http', function($http) {

  this.todos = []
  
  this.deleteTodo = function(id) {
    console.log('delete id ', id);
  }

  this.initialize = function() {
    $http.get('/todos/')
      .then(function(todos) {
        console.log(todos)
      })
      .catch(function(err) {
        console.error(err)
      })
  }

  this.initialize()

  // this.todos = [{
  //   id: 1,
  //   name: 'Todo 1',
  //   isDone: true
  // }, {
  //   id: 2,
  //   name: 'Todo 2',
  //   isDone: false
  // }];
}])

.directive('filterBar', function() {
  return {
    restrict: 'E', // Element
    templateUrl: 'directives/filterBar.html'
  }
})