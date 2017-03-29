/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
angular.module('library_add').
        component('addBook',{
            templateUrl:'library_add/template_library_add.html',
            controller:function libraryaddctrl($resource,libraryfactory){
                var myapp = this;
                myapp.save_record = function(){
                  var postdata = {
                    "book_name":myapp.book_name,
                    "book_author":myapp.book_author
                };  
                libraryfactory.save({},postdata);
                myapp.book_name = "";
                myapp.book_author = "";
                };
                
            }
        });

