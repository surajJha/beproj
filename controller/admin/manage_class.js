$(document).ready(function()
{
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
                    $("#ct_standard").html(options);
                    $("#st_standard").html(options);
                    $("#s_standard").html(options);
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
                    $("#st_subject").html(options);
                },
                error: function()
                {
                    alert("Failure");
                }
            });

    f = "teacher";
    $.ajax(
            {
                type: 'GET',
                url: '../../model/admin/manage_class_options.php',
                data: {
                    field: f
                },
                success: function(j)
                {
                    var options = '<option>Select teacher</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }
                    $("#st_teacher").html(options);
                    $("#ct_teacher").html(options);
                },
                error: function()
                {
                    alert("Failure");
                }
            });

    $("#st_teacher").change(function() {
        $('#st_teacher option:contains("Select")').attr('disabled', 'disabled');
    });

    $("#ct_teacher").change(function() {
        $('#ct_teacher option:contains("Select")').attr('disabled', 'disabled');
    });



    $("#ct_standard").change(function() {
        f = 'division';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/admin/manage_class_options.php',
                    data: {
                        field: f,
                        standard: $("#ct_standard").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select division</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#ct_division").html(options);
                        $('#ct_standard option:contains("Select")').attr('disabled', 'disabled');
                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });

    $("#st_standard").change(function() {
        f = 'division';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/admin/manage_class_options.php',
                    data: {
                        field: f,
                        standard: $("#st_standard").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select division</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#st_division").html(options);
                        $('#st_standard option:contains("Select")').attr('disabled', 'disabled');
                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });

    $("#s_standard").change(function() {
        f = 'division';
        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/admin/manage_class_options.php',
                    data: {
                        field: f,
                        standard: $("#s_standard").val()
                    },
                    success: function(j)
                    {
                        var options = '<option>Select division</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }
                        $("#s_division").html(options);
                        $('#s_standard option:contains("Select")').attr('disabled', 'disabled');
                    },
                    error: function()
                    {
                        alert("Failure");
                    }
                });
    });

    $("#ct_division").change(function() {
        $('#ct_division option:contains("Select")').attr('disabled', 'disabled');
    });

    $("#st_division").change(function() {
        $('#st_division option:contains("Select")').attr('disabled', 'disabled');
    });

    $("#s_division").change(function() {
        $('#s_division option:contains("Select")').attr('disabled', 'disabled');
    });



});