$(document).ready(function() {

    $("#feedback").hide();
    $("#exists").hide();
    $("#div1").hide();
    $("#div2").hide();


    $.ajax(
            {
                type: 'GET',
                url: '../../model/student/feedback.php',
                data: {
                    f: 's1'
                },
                success: function(j)
                {
                    var t = "<option>Select subject</option>";

                    for (var i = 0; i < j.length; i++) {
                        t += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }

                    $("#s1").html(t);
                    $("#div1").show();
                }
            });


    $("#s1").change(function()
    {
        $('#s1 option:contains("Select")').attr('disabled', 'disabled');
        $("#div2").hide();
        $("#exists").hide();
        $("#feedback").hide();

        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/student/feedback.php',
                    data: {
                        f: 's2',
                        subject: $("#s1").val()
                    },
                    success: function(j)
                    {
                        var t = "<option>Select teacher</option>";

                        for (var i = 0; i < j.length; i++) {
                            t += '<option value="' + j[i].user_id + '">' + j[i].name + '</option>';
                        }

                        $("#s2").html(t);
                        $("#div2").show();
                    }
                });
    });

    $("#s2").change(function()
    {
        $('#s2 option:contains("Select")').attr('disabled', 'disabled');
        $("#exists").hide();

        //* check if feedback exists or not 
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/student/feedback.php',
                    data: {
                        f: 'e',
                        subject: $("#s1").val(),
                        teacher: $("#s2").val()
                    },
                    success: function(j)
                    {
                        $("#feedback").show();

                        $("#submit_button").click(function(e) {
                         
                            e.preventDefault();

                            //call ajax to store in db

                            // if success
                            $("#feedback").hide();
                            $("#exists").html("<p style=\"color : green \"><center>Your feedback has been submitted. Thank you!<center></p>");
                            $("#exists").show();

                        });

                    },
                    error: function() {
                        $("#exists").html("<center>You have already filled feedback for this teacher. Please select another teacher.</center>");
                        $("#exists").show();
                    }
                });

    });
});