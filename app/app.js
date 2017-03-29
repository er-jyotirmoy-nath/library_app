'use strict';

// Declare app level module which depends on views, and components
angular.module('myApp', [
  'ngRoute',
  'ngResource',
  'myApp.version',
  'library_factory',
  'library_views',
  'library_add',
  'lib_filter',
  'book_det'
]).
config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
  $locationProvider.hashPrefix('!');
  $routeProvider.
          when('/viewbooks',{
              template:"<library-view></library-view>"
          })
          .when('/addbooks',{
              template:"<add-book></add-book>"
          })
                  .when('/bookdetails/:bid',{
                      template:"<book-detail></book-detail>"
                  })
          .otherwise('/viewbooks');
  
}]);
