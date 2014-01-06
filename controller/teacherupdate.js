// the following function is for loading the form from the teacherupdate view file
$(document).ready(function()
{
    $("#question_bank").click(function() {
        var model_type = '';
        $("#myForm").load("../view/teacherupdate.php #view_question_form", function() {

            //**********FUNCTION FOR SUBMITTING MCQ MODAL*************
            $("button#submit_mcqModal").click(function(e) {
                e.preventDefault();
                var values = $("#mcqModalForm").serialize();
                // alert(values);
                model_type = "mcq";

                $.ajax(
                {
                    type: 'POST',
                    url: '../model/addQuestion.php',
                    cache: false,    
                    data: values+"&model_type="+model_type,
                    //your form datas to post          
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

            $("button#submit_subjectiveModal").click(function(e) {
                e.preventDefault();
                var values = $("#subjectiveModalForm").serialize();
                model_type = "subjective";

                $.ajax(
                {
                    type: 'POST',
                    url: '../model/addQuestion.php',
                    cache: false,
                    data: values+"&model_type="+model_type, //your form datas to post          
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

            $("button#submit_numericModal").click(function(e) {
                e.preventDefault();
                var values = $("#numericModalForm").serialize();
                model_type = "numeric";

                $.ajax(
                {
                    type: 'POST',
                    url: '../model/addQuestion.php',
                    cache: false,
                    data: values+"&model_type="+model_type,//your form datas to post          
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

            $("button#submit_tfModal").click(function(e) {
                e.preventDefault();
                var values = $("#tfModalForm").serialize();
                model_type = "numeric";

                $.ajax(
                {
                    type: 'POST',
                    url: '../model/addQuestion.php',
                    cache: false,
                    data: values+"&model_type="+model_type, //your form datas to post          
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
                      
            // will populate class select
            var f='standard';
            $.ajax(
            {
                type: 'GET',
                url: '../model/question_options.php',
                data:{
                    field: f
                },
                success: function(j)
                {
                    var options = '<option>Select standard</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i]+ '">' + j[i] + '</option>';
                    }
                    
                    $("#standard").html(options);
                        
                },
                error: function()
                {
                    alert("Failure");                
                }
            });
            //********************************************************
            
            
            //will populate select field when standard changes
            $("#standard").change(function(){
                
                f='subject';
                $.ajax(
                {
                    type: 'GET',
                    url: '../model/question_options.php',
                    data: {
                        field:f,
                        standard:$("#standard").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select subject</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i]+ '">' + j[i] + '</option>';
                        }
                        $("#subject").html(options);
                        
                    },
                    error: function()
                    {
                        alert("Failure");                
                    }
                });         
            });
            //********************************************************
            
            //will populate topic field when subject changes
            $("#subject").change(function(){
                
                f='topic';
                $.ajax(
                {
                    type: 'GET',
                    url: '../model/question_options.php',
                    data: {
                        field:f,
                        standard:$("#standard").val(),
                        subject:$("#subject").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select topic</option><option value="*">All topics</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i]+ '">' + j[i] + '</option>';
                        }
                        $("#topic").html(options);
                        
                    },
                    error: function()
                    {
                        alert("Failure");                
                    }
                });         
            });
            //********************************************************
            
            //will populate type field when topic changes
            $("#topic").change(function(){
                
                f='type';
                $.ajax(
                {
                    type: 'GET',
                    url: '../model/question_options.php',
                    data: {
                        field:f,
                        standard:$("#standard").val(),
                        subject:$("#subject").val(),
                        topic:$("#topic").val()
                        
                    },
                    success: function(j)
                    {
                        var options = '<option>Select type</option><option value="*">All types</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i]+ '">' + j[i] + '</option>';
                        }
                        $("#type").html(options);
                        
                    },
                    error: function()
                    {
                        alert("Failure");                
                    }
                });         
            });
            //********************************************************
            
            //will populate level field when type changes
            $("#type").change(function(){
                
                f='level';
                $.ajax(
                {
                    type: 'GET',
                    url: '../model/question_options.php',
                    data: {
                        field:f,
                        standard:$("#standard").val(),
                        subject:$("#subject").val(),
                        topic:$("#topic").val(),
                        type:$("#type").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select level</option><option value="*">All levels</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i]+ '">' + j[i] + '</option>';
                        }
                        $("#level").html(options);
                        
                    },
                    error: function()
                    {
                        alert("Failure");                
                    }
                });         
            });
        //********************************************************
            
        });
    });
});





