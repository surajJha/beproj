$(document).ready(function() {

    //alert("in the test js");
    
  /* $('#clock').countdown('2020/10/10').on('update.countdown', function(event) {
     var $this = $(this).html(event.strftime(''
         + '<span>%H</span> hr '
         + '<span>%M</span> min '
         + '<span>%S</span> sec'));
 });*/
    $("#submit_test").click(function()
    {
        submit();
    });

    function submit()
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
    }

    return false;

});
