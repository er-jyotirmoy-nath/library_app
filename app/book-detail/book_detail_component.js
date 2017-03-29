/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


angular.module('book_det').
        component('bookDetail',{
            templateUrl:'book-detail/template_book_detail.html',
            controller:function bookdetailctrl($resource,libraryfactory,$routeParams){
                var myapp = this;
                var id = $routeParams.bid;
                myapp.list = libraryfactory.get({book_id:bid});
            }
        });