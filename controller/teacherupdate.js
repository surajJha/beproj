// the following function is for loading the form from the teacherupdate view file
$(document).ready(function()
{
    $("#question_bank").click(function() {

        $("#myForm").load("../view/teacherupdate.php #view_question_form",function(){
            
            $.getJSON("../model/teacher_update_options.php",{
                id: $(this).val(), 
                ajax: 'true'
            }, function(j){ 
                var tr;
                for (var i = 0; i < j.length; i++) {
                    tr += '<option value="'+j[i]+'">'+j[i]+'</option>';
                }
                $("select#class2").html(tr);
            });
            
        });
        
    });

});



