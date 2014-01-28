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
                       alert("Test complete!");
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