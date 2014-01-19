/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/// THIS IS A JAVASCRIPT FILE BASICALLY 
$(document).ready(function() {

    $.ajax(
            {
                type: 'POST',
                url: '../../model/student/view_tests.php',
                cache: false,
                // data: values,
                //your form datas to post          
                success: function(data)
                {   
                    var t = "<hr/><div class=\"table-responsive\"><table class=\"table table-striped\">"
                    t += "<thead><tr> <th>Subject</th> <th>Date</th> <th>Duration</th> </tr></thead>";
                    for (var i = 0; i < data.length; i++) {
                        
                        t += "<tr> <td>" + data[i].subject_name + "</td><td>" + data[i].date + "</td><td>" + data[i].duration+" <td><button class=\"test_button btn btn-primary\" value=\""+data[i].test_id+"\">Give Test</button></td>";
                    }
                  
                    t += "</table></div>";
                    $("#test_table").html(t);
                  
                    $(".test_button").click(function(){
                       alert($(this).val()); 
                             var id = $(this).val();
                       var url='http://localhost/beproj/view/student/instruction_window.php?test_id='+id;
                       window.open(url, '_blank', 'toolbar=0,location=0,menubar=0');
                    });
                },
                error: function()
                {
                    alert("Suraj is a failure.");
                }
            });
    return false;
});


