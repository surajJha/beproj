
/// THIS IS A JAVASCRIPT FILE BASICALLY 
$(document).ready(function() {
    var f = "up";
    $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/view_tests.php',
                cache: false,
                data: {f: f},
                success: function(data)
                {
                    if (data == "error" || data == '')
                    {
                        $("#test_table").html("<div class=\"col-lg-8\"><h3><strong>Upcoming Tests</strong></h3><hr/>There are no tests scheduled currently!</div><br><br>");
                    }
                    else
                    {

                        var t = "<div class=\"col-lg-8\"><h3><strong>Upcoming Tests</strong></h3><hr/><div class=\"table-responsive\"><table class=\"table table-striped\">"
                        t += "<thead><tr><th>Test-id</th> <th>Subject</th> <th>Class</th><th>Test Name</th> <th>Date</th> <th>Duration</th> <th>Test Code</th> </tr></thead>";
                        for (var i = 0; i < data.length; i++) {

                            t += "<tr><td>" + data[i].test_id + "</td> <td>" + data[i].subject_name + "</td><td>" + data[i].standard + "-" + data[i].division + "</td><td>" + data[i].test_name + "</td><td>" + data[i].date + "</td><td>" + data[i].duration + " <td> " + data[i].test_code + "</td></tr>";
                        }

                        t += "</table></div></div>";
                        $("#test_table").html(t);
                    }
                },
                error: function()
                {
                    $("#test_table").html("<div class=\"col-lg-8\"><h3><strong>Upcoming Tests</strong></h3><hr/>There are no tests scheduled currently!</div><br><br>");
                }
            });


    f = "prev";
    $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/view_tests.php',
                cache: false,
                data: {f: f},
                success: function(data)
                {
                    if (data == "error" || data == '')
                    {
                        $("#prev_table").html("<div class=\"col-lg-8\"><h3><strong>Previous Tests</strong></h3><hr/>There are no completed tests available currently!</div><br><br>");
                    }
                    else
                    {

                        var t = "<div class=\"col-lg-8\"><h3><strong>Previous Tests</strong></h3><hr/><div class=\"table-responsive\"><table class=\"table table-striped\">"
                        t += "<thead><tr><th>Test-id</th> <th>Subject</th> <th>Class</th><th>Test Name</th> <th>Date</th> <th>Duration</th> <th>Test Code</th> </tr></thead>";
                        for (var i = 0; i < data.length; i++) {

                            t += "<tr><td>" + data[i].test_id + "</td> <td>" + data[i].subject_name + "</td><td>" + data[i].standard + "-" + data[i].division + "</td><td>" + data[i].test_name + "</td><td>" + data[i].date + "</td><td>" + data[i].duration + " <td> " + data[i].test_code + "</td> <td><button class=\"prev_test_button btn btn-success\" value=\"" + data[i].test_id + "\">Result</button></td></tr>";
                        }

                        t += "</table></div></div>";
                        $("#prev_table").html(t);

                        $(".prev_test_button").click(function() {
                            var id = $(this).val();
                            url = "http://localhost/beproj/view/teacher/view_test_results.php?test_id=" + id;
                            window.open(url, '_blank');
                        });
                    }
                },
                error: function()
                {
                    $("#prev_table").html("<div class=\"col-lg-8\"><h3><strong>Previous Tests</strong></h3><hr/>There are no completed tests available currently!</div><br><br>");
                }
            });
    return false;
});


