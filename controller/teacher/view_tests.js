
/// THIS IS A JAVASCRIPT FILE BASICALLY 
$(document).ready(function() {

    $.ajax(
            {
                type: 'POST',
                url: '../../model/teacher/view_tests.php',
                cache: false,
                // data: values,
                //your form datas to post          
                success: function(data)
                {   
                    var t = "<hr/><div class=\"table-responsive\"><table class=\"table table-striped\">"
                    t += "<thead><tr> <th>Subject</th> <th>Date</th> <th>Duration</th> <th>Test Code</th> </tr></thead>";
                    for (var i = 0; i < data.length; i++) {
                        
                        t += "<tr> <td>" + data[i].subject_name + "</td><td>" + data[i].date + "</td><td>" + data[i].duration+" <td> "+data[i].test_code+"</td></tr>";
                    }
                  
                    t += "</table></div>";
                    $("#test_table").html(t);
                },
                error: function()
                {
                    alert("Suraj is a failure.");
                }
            });
    return false;
});


