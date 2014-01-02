/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $('#overview').click(function(){
 $.ajax({
      url: "allStudents.php",
      type: "post",
      data: val,
  datatype: 'json',
      success: function(data){
          if(data){
              $('#result').each().html(data);
          }
            
                    
      },
      error:function(){
          $("#result").html('There was an error updating the settings');
          $("#result").addClass('msg_error');
          $("#result").fadeIn(1500);
      }   
    }); 
});
    });