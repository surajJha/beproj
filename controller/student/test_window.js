$(document).ready(function() {

    $("#submit_test").click(function()
    {
        var values = $("#test_questions").serialize();
        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/student/submit_test.php',
                    cache: false,
                    data: values,
                    success: function(data)
                    {
                       window.location="http://localhost/beproj/view/student/test_result.php";
                    }
                });
        return false;
    });
    return false;

});
