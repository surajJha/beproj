$(document).ready(function()
    {
        $.ajax({
            type: 'GET',
            url: '../../model/teacher/select_custom_questions.php',       
            success: function(data)
            {
                

                var t = "<hr/><div class=\"table-responsive\"><table class=\"table table-striped\">"
                t += "<thead><tr> <th>Question Id</th> <th>Type</th>  <th>Description</th> <th>View</th> </tr></thead>";
                for (var i = 0; i < data.length; i++) {
                    t += "<tr> <td>" + data[i].question_id + "</td><td>" + data[i].type + "</td><td>" + data[i].question_desc + "</td><td>View</td></tr>";
                }
                t += "</table></div>";
                $("#display_questions").html(t);


                    
            },
            error: function()
            {
                $("#message").html("There are no questions that match your selection! Please insert questions into Question Bank!");
            }
        });
        return false;

    });