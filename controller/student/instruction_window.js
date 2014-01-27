$(document).ready(function() {

    $("#submit_test_code").click(function()
    {
        var values = $("#test_code_form").serialize();
        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/student/instruction_window.php',
                    cache: false,
                    data: values,
                    success: function(data)
                    {
                        if(data=="url")
                        {
                            window.location="http://localhost/beproj/view/student/test_window.php";
                        }
                        else
                        {
                            $("#error_message").html(data);
                        }
                    },
                    error: function()
                    {
                        alert("Incorrect test code!");
                    }
                });
        return false;
    });
    return false;

});