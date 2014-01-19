$(document).ready(function()
    {

        //*************************************** **************************************************
        // will populate standard select
        var f = 'standard';
        $.ajax(
        {
            type: 'GET',
            url: '../../model/teacher/set_question_paper_options.php',
            data: {
                field: f
            },
            success: function(j)
            {
                var options = '<option>Select standard</option>';
                for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                }
                $("#sqp_standard").html(options);
            },
            error: function()
            {
                alert("Failure");
            }
        });
        //********************************************************
    
        //will populate division field when standard changes
        $("#sqp_standard").change(function() {

            f = 'division';
            $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/set_question_paper_options.php',
                data: {
                    field: f,
                    standard: $("#sqp_standard").val()
                },
                success: function(j)
                {
                    var options = '<option>Select division</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }
                    $("#sqp_division").html(options);
                    $('#sqp_standard option:contains("Select")').attr('disabled','disabled');
                },
                error: function()
                {
                    alert("Failure");
                }
            });
        });
        //********************************************************

    
        //will populate subject field when standard changes
        $("#sqp_division").change(function() {

            f = 'subject';
            $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/set_question_paper_options.php',
                data: {
                    field: f,
                    standard: $("#sqp_standard").val(),
                    division: $("#sqp_division").val()
                },
                success: function(j)
                {
                    var options = '<option>Select subject</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }
                    $("#sqp_subject").html(options);
                    $('#sqp_division option:contains("Select")').attr('disabled','disabled');

                },
                error: function()
                {
                    alert("Failure");
                }
            });
        });
        //********************************************************

        //will populate topic field when subject changes
        $("#sqp_subject").change(function() {

            f = 'topic';
            $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/set_question_paper_options.php',
                data: {
                    field: f,
                    standard: $("#sqp_standard").val(),
                    division: $("#sqp_division").val(),
                    subject: $("#sqp_subject").val()
                },
                success: function(j)
                {
                    var options = '<option disabled="true">Select topics</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }
                    $("#sqp_topic").html(options);
                    $('#sqp_subject option:contains("Select")').attr('disabled','disabled');


                },
                error: function()
                {
                    alert("Failure");
                }
            });
        });
        //********************************************************
    
    
        //**********set question paper - ajax -> model*************
    
        $("#sqp_submit").click(function()
        {
            var values=$("#set_question_paper_form").serialize();
            
            $("#success_message").empty();
            $("#error_message").empty();    
            
            $.ajax(
            {
                type: 'POST',
                url: '../../model/teacher/set_question_paper.php',
                cache: false,
                data: values,         
                success: function(data)
                {
                    $("#set_question_paper_form")[0].reset();
                    if(data=="The user has been added succesfully!")
                    {
                        $("#success_message").html(data);
                    }else
                    {
                        $("#error_message").html(data);    
                    }
                },
                error: function()
                {
                    alert("Failure");
                }
            });
            return false;
        });
    
    //**********************************************************

    });