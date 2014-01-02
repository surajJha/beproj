/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    $('#overview').click(function(){
      
 $.ajax({
      url: "../controller/allStudents.php",
      type: "POST",     //must be capital letters
      data:"{}",        // send request data to php file
  datatype: 'json',
      success: function(data){ 
          //alert("fssaklnsgsn");
          //displaying data in table format
   var tr;
    for (var i = 0; i < data.length; i++) {
        tr = $('<tr/>');
        tr.append("<td>" + data[i].user_id + "</td>");
        tr.append("<td>" + data[i].password + "</td>");
        tr.append("<td>" + data[i].fname + "</td>");
        $('#mytable').append(tr);
    }
                        },
      error:function(){
        //  alert('FAIL');
          $("#result").html('There was an error updating the settings');
          $("#result").addClass('msg_error');
          $("#result").fadeIn(1500);
      }   
    }); 
});
    });