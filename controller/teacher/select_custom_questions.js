$(document).ready(function()
{
    $.ajax({
        type: 'GET',
        url: '../../model/teacher/select_custom_questions.php',
        success: function(data)
        {
            var t = "<hr/><div><form id=\"select_cq\" method=\"post\"><div class=\"table-responsive\"><table class=\"table table-striped\">"
            t += "<thead><tr> <th></th> <th>Question Id</th> <th>Type</th> <th>Description</th> </tr></thead>";
            for (var i = 0; i < data.length; i++) {
                t += "<tr><td> <input type=\"checkbox\" name=\"question_id[ ]\" value=\"" + data[i].question_id + "\"> </td><td>";
                t += data[i].question_id + "</td><td>" + data[i].type + "</td><td><details><summary>" + data[i].question_desc + "</summary><br/><p><b>Level:</b> "+data[i].level+"</p>";
                if (data[i].type == "Mcq")
                    {
                        t += "<p><b> A: </b> " + data[i].mcq['optionA'] + "&nbsp;&nbsp;&nbsp; <b>B:</b> " + data[i].mcq['optionB'] + " &nbsp; &nbsp; &nbsp; <b> C: </b> " + data[i].mcq['optionC'] + "&nbsp;&nbsp;&nbsp; <b>D:</b> " + data[i].mcq['optionD'] + " </p>";
                    }
                    t += "<p><b>Answer:</b> " + data[i].answer + "</p></details></td><td><a href=# class=\"ud btn btn-primary\" id=\"" + data[i].question_id + "\">Update/delete</a></td></tr>";
            }
            
            t += "</table></div>";
            
            t += "</table></div>";
            t += " <div class=\"row\" ><div class=\"form-group\"> <button id=\"scq_submit\" class=\"btn btn-lg btn-primary\" type=\"submit\">Submit</button></div></div></form></div>";

            $("#display_questions").html(t);

            $("#scq_submit").click(function()
            {
                var values = $("#select_cq").serialize();

                $.ajax({
                    type: 'POST',
                    url: '../../model/teacher/test_has_question.php',
                    cache: false,
                    data: values,
                    success: function(data)
                    {
                        window.location="http://localhost/beproj/view/teacher/set_question_paper.php";
                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
                return false;
            });
            return false;
        },
        error: function()
        {
            $("#message").html("There are no questions that match your selection! Please insert questions into Question Bank!");
        }
    });
    return false;
});