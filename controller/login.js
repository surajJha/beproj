$(document).ready(function()
    {
        $("#login_sub").click(function() {

            /* Get some values from elements on the page: */
            var values = $("#login_form").serialize();

            /* Send the data using post and put the results in a div */
            $.ajax({
                
                url: "../controller/login.php",
                type: "POST",
                data: values,
                success: function(data){
                    
                    
                },
                error:function(){
                    
                }
            });
        });

    });

//$("#login_form").submit(function(){     return false; });