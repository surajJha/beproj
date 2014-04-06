
$(document).ready(function() {
//GET CLASS DETAILS
    $.ajax(
            {
                type: 'GET',
                url: '../../model/student/overview.php',
                data: {
                    f: 2
                },
                success: function(data)
                {
                    var t = "<b>Class Teacher</b> : " + data[0].fname + " " + data[0].lname;
                    $("#r1").html(t);
                }
            });

    //subjects        
    $.ajax(
            {
                type: 'GET',
                url: '../../model/student/overview.php',
                data: {
                    f: 1
                },
                success: function(data)
                {
                    var t = "<div class=\"table-responsive\"><table class=\"table table-striped\">";
                    t += "<thead><tr> <th>Subject</th> <th>Teacher</th></tr></thead>";

                    for (var i = 0; i < data.length; i++) {
                        t += "<tr> <td>" + data[i].subject_name + "</td><td>" + data[i].fname + " " + data[i].lname + "</td></tr>";
                    }
                    t += "</table></div>";
                    $("#r2").html(t);
                }
            });


    
     //get PHOTO
     $.ajax(
     {
     type: 'GET',
     url: '../../model/student/overview.php',
     cache:false,
     async:false,
     
     data: {
     f: 3
     },
     success: function(data)
     {
        $("#pic").attr("src","data:image/jpeg;base64,"+data);
     }
     });
     


    $("body").fadeIn(3000);

});