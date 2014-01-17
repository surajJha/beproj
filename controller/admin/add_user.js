$(document).ready(function()
{
    $("#mother_tongue").hide();
    $("#access_level").hide();

    $("#au_type_student").change(function()
    {

        $("#mother_tongue").show();
        $('#access_level option:contains("Select")').removeAttr('disabled');
        $("#access_level").hide();

    });
    $("#au_type_teacher").change(function()
    {

        $("#mother_tongue").hide();
        $("#access_level").show();

    });



    $("#au_access").change(function() {
        $('#au_access option:contains("Select")').attr('disabled', 'disabled');
    });

    return false;

});