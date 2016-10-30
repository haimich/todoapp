'use strict';

angular.module('myApp.view', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view', {
    templateUrl: '/frontend/app/view/view.html',
    controller: 'TodoController'
  })
}])

.controller('TodoController', [ '$http', function($http) {

  this.todos = []
  
  this.deleteTodo = function(id) {
    console.log('delete id ', id);
  }

  var self = this
  this.initialize = function() {
    $http.get('/todos')
      .then(function(todos) {
        console.log(todos);
        self.todos = todos.data
      })
      .catch(function(err) {
        console.error(err)
      })
  }

  this.initialize()
}])

.directive('filterBar', function() {
  return {
    restrict: 'E', // Element
    templateUrl: '/frontend/app/directives/filterBar.html'
  }
})