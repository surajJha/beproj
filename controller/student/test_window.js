$(document).ready(function() {

    $(".option").change(function() {

        var values = $("#test_questions").serialize();
        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/student/save_response.php',
                    cache: false,
                    data: values,
                    success: function(data)
                    {
                        console.log("value saved to database");
                    }
                });
        return false;
    });

    $("#next").click(function()
    {
        
         var f = "next";
        next_previous(f);
       });
    
    $("#prev").click(function()
    {
         var f = "previous";
        next_previous(f);
    
    });
    function next_previous(f)
    {
        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/student/next_previous.php',
                    async: "false",
                    data: {field: f},
                    success: function(data)
                    {
                        window.location = "http://localhost/beproj/view/student/test_window.php";
                        //$("test_questions.php").load("");
                    }
                });
       

    }
       
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
                        window.location = "http://localhost/beproj/view/student/test_result.php";
                    }
                });
        return false;
    });
    return false;
});
