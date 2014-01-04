// the following function is for loading the form from the teacherupdate view file
$(document).ready(function()
{
    $("#question_bank").click(function() {
        //on click will load form with dropdowns
        $("#myForm").load("../view/teacherupdate.php #view_question_form",function(){
            // and will populate class select
            $.getJSON("../model/options/class.php",{
                standard: $(this).val(), 
                ajax: 'true'
            }, function(j){
                var options = '';
                for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i]+ '">' + j[i] + '</option>';
                }
                $("select#class2").html(options);
            })  
        });
    });
    
});
 
