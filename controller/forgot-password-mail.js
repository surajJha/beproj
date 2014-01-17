/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {

    $("#submit-buttton").click(function() {
        var email = $("#myemail").val();

        alert("submit");
        $.ajax(
                {
                    type: 'POST',
                    url: '../model/forgot_password_mail.php',
                    cache: false,
                    data: {email: email},
                    //your form datas to post          
                    success: function(response)
                    {
                        alert(response);
                            $("#response").html(response);
                       
                    },
                    error: function()
                    {
                        alert("Failure");

                    }

                });


        return false;

    });

});
