// the following function is for loading the form from the teacherupdate view file
$(document).ready(function()
{  
    $("#question_bank").click(function() {
       
        //load the form
        $("#myForm").load("../view/teacherupdate.php #view_question_form",function(){
            //on submit of mcq modal - submit form values
            $("button#submit_mcqModal").click(function(e){
                e.preventDefault();
                var values = $("#mcqModalForm").serialize();
                var success = "QUESTION SUCCESSFULLY INSERTTED :)";
              
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
            
            

        });

    });

});
