/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('lib_filter').
        filter('checkloan',function(){
            return function(input){
                return ((input==1) ?'\u2713' : '\u2718');
            }
        });
