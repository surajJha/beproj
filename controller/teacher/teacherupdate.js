// the following function is for loading the form from the teacherupdate view file
$(document).ready(function()
{
    var model_type = '';
    //**********FUNCTION FOR SUBMITTING MCQ MODAL*************
    $("button#submit_mcqModal").click(function(e) {
        e.preventDefault();
        var values = $("#mcqModalForm").serialize();
        // alert(values);
        model_type = "mcq";

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/teacher/addQuestion.php',
                    cache: false,
                    data: values + "&model_type=" + model_type,
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
                    url: '../../model/teacher/addQuestion.php',
                    cache: false,
                    data: values + "&model_type=" + model_type, //your form datas to post          
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
                    url: '../../model/teacher/addQuestion.php',
                    cache: false,
                    data: values + "&model_type=" + model_type, //your form datas to post          
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




    //*****************FUNCTION FOR SUBMITTING TRUE FALLSE MODAL*******

    $("button#submit_tfModal").click(function(e) {
        e.preventDefault();
        var values = $("#tfModalForm").serialize();
        model_type = "numeric";

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/teacher/addQuestion.php',
                    cache: false,
                    data: values + "&model_type=" + model_type, //your form datas to post          
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
    //*************************************************************//

    //*******CODE FOR UPDATING FORM SELECT OPTIONS******ALL FUNCTIONS**************

    // will populate class select
    var f = 'standard';
    $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/view_question_options.php',
                data: {
                    field: f
                },
                success: function(j)
                {
                    var options = '<option>Select standard</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }

                    $("#vq_standard").html(options);
                    //WILL POPULATE ALL STANDARD FIELDS OF ALL MODALS
                    $("#mcq_standard").html(options);
                    $("#sub_standard").html(options);
                    $("#num_standard").html(options);
                    $("#tf_standard").html(options);
                },
                error: function()
                {
                    alert("Failure");
                }
            });
    //********************************************************


    //will populate subject field when standard changes
    $("#vq_standard").change(function() {

        f = 'subject';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/view_question_options.php',
                    data: {
                        field: f,
                        standard: $("#vq_standard").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select subject</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#vq_subject").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });
    //********************************************************

    //will populate topic field when subject changes
    $("#vq_subject").change(function() {

        f = 'topic';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/view_question_options.php',
                    data: {
                        field: f,
                        standard: $("#vq_standard").val(),
                        subject: $("#vq_subject").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select topic</option><option value="*">All topics</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#vq_topic").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });
    //********************************************************

    //will populate type field when topic changes
    $("#vq_topic").change(function() {

        f = 'type';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/view_question_options.php',
                    data: {
                        field: f,
                        standard: $("#vq_standard").val(),
                        subject: $("#vq_subject").val(),
                        topic: $("#vq_topic").val()

                    },
                    success: function(j)
                    {
                        var options = '<option>Select type</option><option value="*">All types</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#vq_type").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });
    //********************************************************

    //will populate level field when type changes
    $("#vq_type").change(function() {

        f = 'level';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/view_question_options.php',
                    data: {
                        field: f,
                        standard: $("#vq_standard").val(),
                        subject: $("#vq_subject").val(),
                        topic: $("#vq_topic").val(),
                        type: $("#vq_type").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select level</option><option value="*">All levels</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#vq_level").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });
    //*********************************************************************************

    //************FUNCTION TO SUBMIT QUERY AND EXTRACT QUESTIONS FROM DATABASE*********


    $("#vq_go_button").click(function() {
        var values = $("#view_questions").serialize();

        $.ajax({
            type: 'POST',
            url: '../../model/teacher/display_questions.php',
            data: values,
            cache: false,
            success: function(data) {

                var t = "<hr/><div class=\"table-responsive\"><table class=\"table table-striped\"><caption><h3>Question Bank</h3></caption>"
                t += "<thead><tr> <th>Question Id</th> <th>Type</th> <th>Level</th> <th>Description</th> <th>Update/Delete</th> </tr></thead>";
                for (var i = 0; i < data.length; i++) {
                    t += "<tr> <td>" + data[i].question_id + "</td><td>" + data[i].type + "</td><td>" + data[i].level + "</td><td>" + data[i].question_desc + "</td><td>idhar ek button aayega</td>";
                }
                t += "</table></div>";
                $("#myContent").html(t);
            },
            error: function() {
                var e = "<p style=\"color:blue\">Sorry! There are no questions matching your request!</p>";
            }

        });

        return false;

    });

    //*********************************************************************************************

    //***********MCQ MODAL OPTIONS*****************************************
    //will populate subject field when standard changes
    $("#mcq_standard").change(function() {

        f = 'subject';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/add_question_options.php',
                    data: {
                        field: f,
                        standard: $("#mcq_standard").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select subject</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#mcq_subject").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });
    //********************************************************

    //will populate topic field when subject changes
    $("#mcq_subject").change(function() {

        f = 'topic';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/add_question_options.php',
                    data: {
                        field: f,
                        standard: $("#mcq_standard").val(),
                        subject: $("#mcq_subject").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select topic</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#mcq_topic").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });

    $("#mcq_topic").change(function() {


        var options = '<option>Select level</option>';
        for (var i = 1; i < 6; i++) {
            options += '<option value="' + i + '">' + i + '</option>';
        }
        $("#mcq_level").html(options);

    });

    //***********END OF MCQ MODAL OPTIONS *****************************************

    //***********SUBJECTIVE MODAL OPTIONS*****************************************
    //will populate subject field when standard changes
    $("#sub_standard").change(function() {

        f = 'subject';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/add_question_options.php',
                    data: {
                        field: f,
                        standard: $("#sub_standard").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select subject</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#sub_subject").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });
    //********************************************************

    //will populate topic field when subject changes
    $("#sub_subject").change(function() {

        f = 'topic';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/add_question_options.php',
                    data: {
                        field: f,
                        standard: $("#sub_standard").val(),
                        subject: $("#sub_subject").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select topic</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#sub_topic").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });

    $("#sub_topic").change(function() {


        var options = '<option>Select level</option>';
        for (var i = 1; i < 6; i++) {
            options += '<option value="' + i + '">' + i + '</option>';
        }
        $("#sub_level").html(options);

    });

    //***********END OF SUBJECTIVE MODAL OPTIONS *****************************************

    //***********NUMERIC MODAL OPTIONS*****************************************
    //will populate subject field when standard changes
    $("#num_standard").change(function() {

        f = 'subject';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/add_question_options.php',
                    data: {
                        field: f,
                        standard: $("#num_standard").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select subject</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#num_subject").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });
    //********************************************************

    //will populate topic field when subject changes
    $("#num_subject").change(function() {

        f = 'topic';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/add_question_options.php',
                    data: {
                        field: f,
                        standard: $("#num_standard").val(),
                        subject: $("#num_subject").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select topic</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#num_topic").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });

    $("#num_topic").change(function() {


        var options = '<option>Select level</option>';
        for (var i = 1; i < 6; i++) {
            options += '<option value="' + i + '">' + i + '</option>';
        }
        $("#num_level").html(options);

    });

    //***********END OF NUMERIC MODAL OPTIONS *****************************************


    //***********TRUE OR FALSE MODAL OPTIONS*****************************************
    //will populate subject field when standard changes
    $("#tf_standard").change(function() {

        f = 'subject';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/add_question_options.php',
                    data: {
                        field: f,
                        standard: $("#tf_standard").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select subject</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#tf_subject").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });
    //********************************************************

    //will populate topic field when subject changes
    $("#tf_subject").change(function() {

        f = 'topic';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/add_question_options.php',
                    data: {
                        field: f,
                        standard: $("#tf_standard").val(),
                        subject: $("#tf_subject").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select topic</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#tf_topic").html(options);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });

    $("#tf_topic").change(function() {


        var options = '<option>Select level</option>';
        for (var i = 1; i < 6; i++) {
            options += '<option value="' + i + '">' + i + '</option>';
        }
        $("#tf_level").html(options);

    });

    //***********END OF TRUE OR FALSE MODAL OPTIONS *****************************************


});






