
/// THIS IS A JAVASCRIPT FILE BASICALLY 
$(document).ready(function() {

    var f = 'up';
    $.ajax(
            {
                type: 'POST',
                url: '../../model/student/view_tests.php',
                data:{field:f},
                cache: false,
                // data: values,
                //your form datas to post          
                success: function(data)
                {
                    if (data == "error" || data == '')
                    {
                        $("#test_table").html("<div class=\"col-lg-8\"><h3><strong>Upcoming Tests</strong></h3><hr/>There are no tests scheduled currently!</div><br><br>");
                    }
                    else
                    {
                        var t = "<div class=\"col-lg-8\"><h3><strong>Upcoming Tests</strong></h3><hr/><div class=\"table-responsive\"><table class=\"table table-striped\">";
                        t += "<thead><tr> <th>Test-id</th> <th> Test </th> <th>Subject</th> <th>Date</th> <th>Duration</th> </tr></thead>";
                        for (var i = 0; i < data.length; i++)
                        {

                            t += "<tr> <td>" + data[i].test_id + " </td> <td>" + data[i].test_name + " </td> <td>" + data[i].subject_name + "</td><td>" + data[i].date + "</td><td>" + data[i].duration + " mins</td> <td><button class=\"test_button btn btn-primary\" value=\"" + data[i].test_id + "\">Give Test</button></td>";
                        }

                        t += "</table></div></div>";
                        $("#test_table").html(t);

                        $(".test_button").click(function() {

                            var id = $(this).val();
                            var url = 'http://localhost/beproj/view/student/instruction_window.php?test_id=' + id;
                            window.open(url, '_blank', 'toolbar=0,location=0,menubar=0');
                        });

                    }
                }

            });

    f = 'prev';
    $.ajax(
            {
                type: 'POST',
                url: '../../model/student/view_tests.php',
                data: {field: f},
                cache: false,
                // data: values,
                //your form datas to post          
                success: function(data)
                {
                    if (data == "error" || data == '')
                    {
                        $("#prev_test_table").html("<div class=\"col-lg-8\"><h3><strong>Previous Tests</strong></h3><hr/>You have not given any tests yet!</div>");
                    }
                    else
                    {
                        var t = "<div class=\"col-lg-8\"><h3><strong>Previous Tests</strong></h3><hr/><div class=\"table-responsive\"><table class=\"table table-striped\">"
                        t += "<thead><tr> <th>Test-id</th> <th> Test </th> <th>Subject</th> <th>Date</th> <th>Duration</th> </tr></thead>";
                        for (var i = 0; i < data.length; i++)
                        {

                            t += "<tr> <td>" + data[i].test_id + " </td> <td>" + data[i].test_name + " </td> <td>" + data[i].subject_name + "</td><td>" + data[i].date + "</td><td>" + data[i].duration + " mins</td> <td><button class=\"prev_test_button btn btn-success\" value=\"" + data[i].test_id + "\">Result</button></td></tr>";
                        }

                        t += "</table></div></div>";
                        $("#prev_test_table").html(t);

                        $(".prev_test_button").click(function() {
                            var id = $(this).val();
                            url = "http://localhost/beproj/view/student/view_test_result.php?test_id=" + id;
                            window.open(url, '_blank');
                        });

                    }
                }

            });

    return false;
});


