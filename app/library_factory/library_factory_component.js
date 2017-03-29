/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('library_factory').
        factory('libraryfactory',function($resource){
            return $resource('http://127.0.0.2/library_app/app/PHP/manage_lib.php/:book_id',{book_id:'@bookid'},{
                loan:{
                    method:'PUT',
                    params:{book_id:'@bookid'},
                    isArray:false
                }
            });
        });
