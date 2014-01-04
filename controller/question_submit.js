/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   $("#submit_mcqModal").click(function(){
       $("../view/teacherview #myForm").load("#view_question_form");
   }) ;
});

