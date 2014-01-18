$(document).ready(function()
    {
        $("#submit_acad_year").click(function(){
            var values=$("#acad_year_form").serialize();
        
            $.ajax(
            {
                type: 'POST',
                url: '../../model/admin/manage_academic_year.php',
                cache: false,
                data: values,
                success: function(data)
                {
                    if(data=="Academic year updated succesfully!")
                    {
                        $("#success_message").html(data);
                    }else
                    {
                        $("#error_message").html(data);    
                    }
                }
            });
            return false;
   
        });
    });
