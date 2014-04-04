$(document).ready(function() {
    // GET SUBJECT DETAILS
    $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/overview.php',
                data: {
                    f: 1
                },
                success: function(data)
                {
                    var t = "<div class=\"table-responsive\"><table class=\"table table-striped\"><caption><h3>Subjects Allocated</h3></caption>"
                    t += "<thead><tr> <th>Subject</th> <th>Standard</th><th>Division</th></tr></thead>";

                    for (var i = 0; i < data.length; i++) {
                        t += "<tr> <td>" + data[i].subject_name + "</td><td>" + data[i].standard + "</td><td>" + data[i].division + "</td></tr>";
                    }
                    t += "</table></div>";
                    
                    $("#r1").html(t);
                }
            });

    // GET CLASS DETAILS
    $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/overview.php',
                data: {
                    f: 2
                },
                success: function(data)
                {
                    var t="";
                    if (data)
                    {
                        t = "<br><div class=\"table-responsive\"><table class=\"table table-striped\"><caption><h3>Classes Allocated</h3></caption>"
                        t += "<thead><tr><th>Standard</th><th>Division</th></tr></thead>";

                        for (var i = 0; i < data.length; i++) {
                            t += "<tr><td>" + data[i].standard + "</td><td>" + data[i].division + "</td></tr>";
                        }
                        t += "</table></div>";
                    }
                    else
                    {
                       t = "<br><br><br><div class=\"table-responsive\"><table class=\"table table-striped\"><caption><h3>Classes Allocated</h3></caption></table></div>";
                       t+="<p>No classes have been alloted to you.</p>";
                    }
                    
                    $("#r2").html(t);
                }
            });
    // get PHOTO
    $.ajax(
            {
                type: 'GET',
                url: '../../model/teacher/overview.php',
                data: {
                    f: 3
                },
                success: function(data)
                {

                }
            });
            
    $("body").fadeIn(3000);        
            
});