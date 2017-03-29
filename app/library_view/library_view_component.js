/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
angular.module('library_views').
        component('libraryView',{
            templateUrl: 'library_view/template_library_view.html',
            controller: function libraryviewctrl($resource,libraryfactory){
                var myapp = this;
                myapp.list = libraryfactory.get();
                
                myapp.loan_book = function(d){
                    
                    myapp.list = libraryfactory.loan({book_id:d});
                    
                };
                
                myapp.remove_book = function(d){
                    myapp.list = libraryfactory.delete({book_id:d});
                };
            }
        });
