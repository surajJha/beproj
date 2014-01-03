// the following function is for loading the form from the teacherupdate view file
$(document).ready(function()
{
    $("#question_bank").click(function() {

        $("#myForm").load("../view/teacherupdate.php #view_question_form");
        
        });

});



