// the following function is for loading the form from the teacherupdate view file
$(document).ready(function(){
    $("#question_bank").click(function(){
          $("#myForm").load("../view/teacherupdate.php #view_question_form");
    }); 
});

$(document).ready(function(){
    $("#go").click(function(){
          var values=$("#view_question_form").serialize();
          
          $.ajax({
             url:"../model/display_questions.php",
             type:"POST",
             data:values,
             success: function(data)
             {
                 alert("success");
                 
             },
             error:function()
             {
                    alert("failure");
             }
                    
          });
    }); 
});



