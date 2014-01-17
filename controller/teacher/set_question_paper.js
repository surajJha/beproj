$(document).ready(function()
    {

        //*************************************** **************************************************
        // will populate standard select
        var f = 'standard';
        $.ajax(
        {
            type: 'GET',
            url: '../../model/teacher/set_test_options.php',
            data: {
                field: f
            },
            success: function(j)
            {
                var options = '<option>Select standard</option>';
                for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                }
                $("#set_test_standard").html(options);
            },
            error: function()
            {
                alert("Failure");
            }
        });
        //********************************************************
    
        //will populate division field when standard changes
        $("#set_test_standard").change(function() {

            f = 'division';
            $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/set_test_options.php',
                data: {
                    field: f,
                    standard: $("#set_test_standard").val()
                },
                success: function(j)
                {
                    var options = '<option>Select division</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }
                    $("#set_test_division").html(options);
                    $('#set_test_standard option:contains("Select")').attr('disabled','disabled');
                },
                error: function()
                {
                    alert("Failure");
                }
            });
        });
        //********************************************************

    
        //will populate subject field when standard changes
        $("#set_test_division").change(function() {

            f = 'subject';
            $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/set_test_options.php',
                data: {
                    field: f,
                    standard: $("#set_test_standard").val(),
                    division: $("#set_test_division").val()
                },
                success: function(j)
                {
                    var options = '<option>Select subject</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }
                    $("#set_test_subject").html(options);
                    $('#set_test_division option:contains("Select")').attr('disabled','disabled');

                },
                error: function()
                {
                    alert("Failure");
                }
            });
        });
        //********************************************************

        //will populate topic field when subject changes
        $("#set_test_subject").change(function() {

            f = 'topic';
            $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/set_test_options.php',
                data: {
                    field: f,
                    standard: $("#set_test_standard").val(),
                    division: $("#set_test_division").val(),
                    subject: $("#set_test_subject").val()
                },
                success: function(j)
                {
                    var options = '<option disabled="true">Select topics</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }
                    $("#set_test_topic").html(options);
                    $('#set_test_subject option:contains("Select")').attr('disabled','disabled');


                },
                error: function()
                {
                    alert("Failure");
                }
            });
        });
    //********************************************************

    });