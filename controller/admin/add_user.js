$(document).ready(function()
    {
        $("#mother_tongue").hide();
        $("#access_level").hide();

        $("#au_type").change(function()
        {
            $('#au_type option:contains("Select")').attr('disabled', 'disabled');

            if($(this).val()=="student")
            {
                $("#mother_tongue").show();
                $('#access_level option:contains("Select")').removeAttr('disabled');
                $("#access_level").hide();
            }
            if($(this).val()=="teacher")
            {
                $("#mother_tongue").hide();
                $("#access_level").show();
            }
            if($(this).val()=="admin")
            {
                $("#mother_tongue").hide();
                $('#access_level option:contains("Select")').removeAttr('disabled');
                $("#access_level").hide();
            }
        });

        $("#au_access").change(function() {
            $('#au_access option:contains("Select")').attr('disabled', 'disabled');
        });
    
        $("#submit_add_user").click(function()
        {
            var values=$("#add_user_form").serialize();
            
            $.ajax(
            {
                type: 'POST',
                url: '../../model/admin/add_user.php',
                cache: false,
                data: values,         
                success: function(response)
                {
                    alert(response);
                    $("#add_user_form")[0].reset();
                },
                error: function()
                {
                    alert("Failure");
                }
            });
            return false;
        });
    });