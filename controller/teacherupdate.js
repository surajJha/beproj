// the following function is for loading the form from the teacherupdate view file
$(document).ready(function()
{  
    $("#question_bank").click(function() {
         alert("suraj");
        $("#myForm").load("../view/teacherupdate.php #view_question_form",function(){
            
            //**********FUNCTION FOR SUBMITTING MCQ MODAL*************
            $("button#submit_mcqModal").click(function(e){
                    e.preventDefault();
               var values = $("#mcqModalForm").serialize();
             
              
    $.ajax(
            {
                type: 'POST',
                url: '../model/mcqModal.php',
                cache:false,
                data: values, //your form datas to post          
                success: function(response)
                {
                    alert(response);
                    //$(".modal-content.success_message").html("<div>SUCCESSFUL SUBMISSION</div>");
                    $("#mcqModalForm")[0].reset();
                     

                },
                error: function()
                {
                    alert("Failure");
                    
                }
            });  
            });
            
            //*************************************************************
            //
            //
            //*****************FUNCTION FOR SUBMITTING SUBJECTIVE MODAL*******
            
             $("button#submit_subjectiveModal").click(function(e){
                    e.preventDefault();
               var values = $("#subjectiveModalForm").serialize();
             
              
    $.ajax(
            {
                type: 'POST',
                url: '../model/mcqModal.php',
                cache:false,
                data: values, //your form datas to post          
                success: function(response)
                {
                    alert(response);
                    //$(".modal-content.success_message").html("<div>SUCCESSFUL SUBMISSION</div>");
                    $("#subjectiveModalForm")[0].reset();
                     

                },
                error: function()
                {
                    alert("Failure");
                    
                }
            });  
            });
            
            
             //*************************************************************
             
             
             
           
             
             //*****************FUNCTION FOR SUBMITTING NUMERIC MODAL*******
             
             $("button#submit_numericModal").click(function(e){
                    e.preventDefault();
               var values = $("#numericModalForm").serialize();
             
              
    $.ajax(
            {
                type: 'POST',
                url: '../model/mcqModal.php',
                cache:false,
                data: values, //your form datas to post          
                success: function(response)
                {
                    alert(response);
                    //$(".modal-content.success_message").html("<div>SUCCESSFUL SUBMISSION</div>");
                    $("#numericModalForm")[0].reset();
                     

                },
                error: function()
                {
                    alert("Failure");
                    
                }
            });  
            });
            
            
            
             //*************************************************************
             
             
            
            
            //*****************FUNCTION FOR SUBMITTING SUBJECTIVE MODAL*******
            
            $("button#submit_tfModal").click(function(e){
                    e.preventDefault();
               var values = $("#tfModalForm").serialize();
             
              
    $.ajax(
            {
                type: 'POST',
                url: '../model/mcqModal.php',
                cache:false,
                data: values, //your form datas to post          
                success: function(response)
                {
                    alert(response);
                    //$(".modal-content.success_message").html("<div>SUCCESSFUL SUBMISSION</div>");
                    $("#tfModalForm")[0].reset();
                     

                },
                error: function()
                {
                    alert("Failure");
                    
                }
            });  
            });
            
            
             //*************************************************************
            
            
        });

    });

});





