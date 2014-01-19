$(document).ready(function()
{ 
       $("#edit_profile_form").parsley('validate');
     $("#re_enter_password").hide();
                   // if($("#password").val().size()!=0)
                      $("#password").change(function(){
                          $("#re_enter_password").show();
                      });
                    
    $("#edit_profile_submit").click(function() {

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
                            $("#success_message").html('<h3><strong>Your details have been updated successfully!</strong></h3>');
                        else
                            $("#error_message").html("<h3><strong>Failed to update your details ! please try again !</strong></h3>");
                    },
                     error: function()
                    {
                        alert("Failure");

                    }
                });
        return false;
    });
});