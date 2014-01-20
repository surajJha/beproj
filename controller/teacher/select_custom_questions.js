$(document).ready(function()
    {
        $.ajax({
            type: 'GET',
            url: '../../model/teacher/select_custom_questions.php',
            data: values,         
            success: function(data)
            {
                alert(data);
            },
            error: function()
            {
                alert("Failure");
            }
        });
        return false;

    });