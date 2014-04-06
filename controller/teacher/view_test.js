$(document).ready(function()
{
    $("body").hide();
    $("#error_message").hide();
    var f = 't';
    var test_id = $("p:first").text();
    $.ajax({
        type: 'GET',
        data: {f: f,
            test_id: test_id},
        url: '../../model/teacher/view_test_results.php',
        success: function(data)
        {
            var str = "<center><h3>Test</h3></center>";
            str += "<div class=\"row\"><div class=\"col-lg-offset-2 col-lg-5\">";
            str += "<b>Test id : </b> " + test_id + "<br/>";
            str += "<b>Subject : </b> " + data.subject_name + "<br/>";
            str += "<b>Class : </b> " + data.standard + " - " + data.division + "<br/>";
            str += "</div><div class=\"col-lg-5\">";
            str += "<b>Date : </b> " + data.date + "<br/>";
            str += "<b>Duration : </b> " + data.duration + " mins<br/>";
            str += "</div></div>";
            $("#test_summary").html(str);
        },
        error: function()
        {
            $("#error_message").show();
            $("#error_message").html("There was an error in retrieving the data. Please try again!");
        }
    });


    var f = 'q';
    $.ajax({
        type: 'GET',
        data: {f: f,
            test_id: test_id},
        url: '../../model/teacher/view_test_results.php',
        success: function(data)
        {
            if (data.length > 0)
            {
                var t = "<hr/><div class=\"table-responsive\"><table class=\"table table-striped\"><caption><h3>Questions</h3></caption>"
                t += "<thead><tr> <th>QNo.</th> <th>Topic</th> <th>Type</th><th>Description</th><th>Answer</th></tr></thead>";
                for (var i = 0; i < data.length; i++) {
                    t += "<tr> <td>" + (i + 1) + "</td><td>" + data[i].question_id + "</td><td>" + data[i].type + "</td><td><details><summary>" + data[i].question_desc + "</summary><br/>";
                    if (data[i].type == "Mcq")
                    {
                        t += "<p><b> A: </b> " + data[i].mcq['optionA'] + "&nbsp;&nbsp;&nbsp; <b>B:</b> " + data[i].mcq['optionB'] + " &nbsp; &nbsp; &nbsp; <b> C: </b> " + data[i].mcq['optionC'] + "&nbsp;&nbsp;&nbsp; <b>D:</b> " + data[i].mcq['optionD'] + " </p>";
                    }
                    t += "</details></td><td>" + data[i].answer + "</td></tr>";
                }
                t += "</table></div>";
                $("#question_details").html(t);
            }
            else
            {
                var t = "</hr><div class='row' style='padding:10%'><center>This is a randomly generated test! You have not set any custom questions!<center></div>"
                $("#question_details").html(t);
            }

        },
        error: function()
        {
            $("#error_message").show();
            $("#error_message").html("There was an error in retrieving the data. Please try again!");
        }
    });

    $("body").delay(1200).fadeIn(3000);

    $("#b").show();
    $("button").click(function() {

        $.ajax({
            type: 'GET',
            data: {
                test_id: test_id},
            url: '../../model/teacher/delete_test.php'
            ,
            success: function(data)
            {
                if (data == "deleted")
                {
                    window.location="http://localhost/beproj/view/teacher/view_tests.php";
                }
            },
            error: function()
            {
                $("#error_message").show();
                $("#error_message").html("There was an error in deleting the test. Please try again!");
            }
        });
    });
});
