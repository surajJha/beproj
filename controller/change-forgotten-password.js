/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $("#change-password-buttton").click(function() {
        //pwds do not match, send error message ie validation
        if ($("#mypassword").val() != $("#re-password").val()) {
            $("#err-message").html("password's do not match !").css("color", "crimson");

        }
        //password's match then call ajax and and update database with new password 
        if ($("#mypassword").val() == $("#re-password").val())
        {
            var values = $("#change-password-form").serialize();
            $.ajax(
                    {
                        type: 'POST',
                        url: '../../model/change-forgotten-password.php',
                        cache: false,
                        data: values,
                        //your form datas to post          
                        success: function(response)
                        {
                            $("#result").html(response).css("color","green");
                           // alert(response);
                            //$(".modal-content.success_message").html("<div>SUCCESSFUL SUBMISSION</div>");
                            $("#change-password-form")[0].reset();


                        },
                        error: function()
                        {
                            alert("Failure");

                        }
                    });
        }

    });
});


