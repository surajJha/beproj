$(document).ready(function()
    {
        $("#login_sub").click(function()
        {
            var values=$("#login_form").serialize();
    
            $.ajax({
                type: 'POST',
                url: '../model/login.php',
                cache: false,
                data: values,
                success: function(response)
                {
                    if(response == "e")
                    {
                            
                        $("#forgot").html("Incorrect username or password!<br/><a href=\"forgot_password.php\">Forgot ?</a><br/>");
                    }
                    else
                    {
                        window.location=response;  
                    }
                }
            });
            return false;
        });

    });
