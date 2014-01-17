$(document).ready(function()
{
    $("#ms_new_subject").hide();
    
    var f = 'standard';
    var d = 'def';
    $.ajax(
            {
                type: 'GET',
                url: '../../model/admin/manage_class_options.php',
                data: {
                    field: f
                },
                success: function(j)
                {
                    var options = '<option>Select standard</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }
                    $("#ms_standard").html(options);
                },
                error: function()
                {
                    alert("Failure");
                }
            });


    f = "subject";
    $.ajax(
            {
                type: 'GET',
                url: '../../model/admin/manage_class_options.php',
                data: {
                    field: f
                },
                success: function(j)
                {
                    var options = '<option>Select subject</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }
                    options += '<option value="other">Other</option>';
                    $("#ms_subject").html(options);
                },
                error: function()
                {
                    alert("Failure");
                }
            });

    $("#ms_standard").change(function() {
        $('#ms_standard option:contains("Select")').attr('disabled', 'disabled');
    });

    $("#ms_subject").change(function() {
        $('#ms_subject option:contains("Select")').attr('disabled', 'disabled');
        
        var subject=$("#ms_subject").val();
        if(subject=="other")
        {
            $("#ms_new_subject").show();
        }
        else
        {
            $("#ms_new_subject").hide();
        }
        
        
    });
});