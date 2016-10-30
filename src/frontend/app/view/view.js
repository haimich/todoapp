'use strict';

angular.module('myApp.view', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view', {
    templateUrl: '/frontend/app/view/view.html',
    controller: 'TodoController'
  })
}])

.controller('TodoController', [ '$http', function($http) {
  var self = this

  this.todos = []
  
  this.deleteTodo = function(id) {
    $http.delete('/todos/' + id)
      .then(function() {
        console.log('Deleted todo ' + id)
        self.initialize()
      })
      .catch(function(err) {
        console.error(err)
      })
  }

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