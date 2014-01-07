$(document).ready(function()
{
    $("#edit_profile_submit").click(function() {

        var values=$("#edit_profile_form").serialize();

        $.ajax(
                {
                    type: 'POST',
                    url: '../model/edit_profile.php',
                    cache: false,
                    data: values,
                    //your form datas to post          
                    success: function(response)
                    {
                        $("#success_message").html(response);
                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });
});