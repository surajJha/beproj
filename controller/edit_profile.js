$(document).ready(function()
{
    $("#success_message").empty();
    $("#error_message").empty();
    $("#re_enter_password").hide();

    $('#password').on('input', function() {
        $("#re_enter_password").show();
    })

    $("#re_password").focus(function()
    {
        if ($("#password").val().length == 0) {
            $("#re_enter_password").hide();
        }
    });

    $("#password").change(function() {
        $("#re_enter_password").show();
    });

    $("#edit_profile_submit").click(function() {

        $("#success_message").empty();
        $("#error_message").empty();

        var values = $("#edit_profile_form").serialize();

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/edit_profile.php',
                    cache: false,
                    data: values,
                    //your form datas to post          
                    success: function(response)
                    {
                        if (response == "success")
                        {
                            $('#password').val('');
                            $("#re_enter_password").hide();
                            $("#success_message").html('Your details have been updated successfully!');
                        }
                        else
                        {
                            $('#password').val('');
                            $("#re_enter_password").hide();
                            $("#error_message").html("Failed to update your details ! please try again !");
                        }
                    },
                    error: function()
                    {
                        alert("Failure");

                    }
                });
        return false;
    });
});