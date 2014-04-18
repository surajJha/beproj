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

    //assign class teacher
    $("#submit_class_teacher").click(function()
    {
        var values = $("#assign_class_teacher").serialize();
        values += "&tab=1"

        $("#success_message_tab1").empty();
        $("#error_message_tab1").empty();

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/admin/manage_class.php',
                    cache: false,
                    data: values,
                    success: function(data)
                    {
                        if (data == "Class teacher has been assigned successfully!")
                        {
                            $("#success_message_tab1").html(data);
                        } else
                        {
                            $("#error_message_tab1").html(data);
                        }

                        $("#assign_class_teacher")[0].reset();
                    }
                });
        return false;
    });

    //assign_subject_teacher
    $("#submit_subject_teacher").click(function()
    {
        var values = $("#assign_subject_teacher").serialize();
        values += "&tab=2"

        $("#success_message_tab2").empty();
        $("#error_message_tab2").empty();

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/admin/manage_class.php',
                    cache: false,
                    data: values,
                    success: function(data)
                    {
                        $("#assign_subject_teacher")[0].reset();
                        if (data == "Subject teacher has been assigned successfully!")
                        {
                            $("#success_message_tab2").html(data);
                        } else
                        {
                            $("#error_message_tab2").html(data);
                        }
                    }
                });
        return false;
    });

    //add students to class
    $("#submit_assign_students").click(function()
    {
        var values = $("#assign_students").serialize();
        values += "&tab=3"

        $("#success_message_tab3").empty();
        $("#error_message_tab3").empty();

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/admin/manage_class.php',
                    cache: false,
                    data: values,
                    success: function(data)
                    {
                        $("#assign_students")[0].reset();
                        if (data == "Students have been assigned successfully!")
                        {
                            $("#success_message_tab3").html(data);
                        } else
                        {
                            $("#error_message_tab3").html(data);
                        }
                    }
                });
        return false;
    });

    //add new class
    $("#submit_add_class").click(function()
    {
        var values = $("#add_class").serialize();
        values += "&tab=4"

        $("#success_message_tab4").empty();
        $("#error_message_tab4").empty();

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/admin/manage_class.php',
                    cache: false,
                    data: values,
                    success: function(data)
                    {
                        $("#add_class")[0].reset();
                        if (data == "Class has been inserted successfully!")
                        {
                            $("#success_message_tab4").html(data);
                        } else
                        {
                            $("#error_message_tab4").html(data);
                        }
                    }
                });
        return false;
    });
        //diaplay class teacher
    $("#search_class_teacher").click(function()
    {
        var values = $("#add_class").serialize();
        values += "&tab=4";

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/admin/manage_class.php',
                    cache: false,
                    data: {values: values,
                        field: "display"},
                    success: function(data)
                    {
                        if (data == "error" || data == '')
                        {
                            $("#class_teacher").html("<div class='panel panel-info' style='width:75%'><div class='panel-heading'><h3><strong>Class Teacher</strong></h3></div><div class='panel-body'><div style='padding:2%'><center>No previous year record found!</center></div></div></div><br><br>");
                        }
                        else
                        {
                            var flag = 0; // true for current and upcoming academic years(used to edit current and upcoming academic year date)
                            var t = "<div class='panel panel-info' style='width:75%'><div class='panel-heading'><h3><strong>Class Teacher</strong></h3></div><div class='panel-body'><div class=\"table-responsive\"><table class=\"table table-striped\">";
                            t += "<thead><tr> <th></th> <th> Start Date </th> <th>End Date</th> </tr></thead>";
                            for (var i = 0; i < data.length; i++)
                            {

                                t += "<tr> <td>" + data[i].acad_year + " </td> <td>" + data[i].acad_start + " </td> <td>" + data[i].acad_end + "</td>";
                                if (data[i].flag_current == 1 || flag == 1)
                                {
                                    flag = 1;
                                    t += "<td><a href=\"#\" class=\"btn  btn-success edit\" data-toggle=\"modal\"  data-id=\" + data[i].acad_year + \" data-target=\"#edit\">Edit Date</a></td>";
                                }
                            }

                            t += "</table></div></div></div>";

                            $("#class_teacher").html(t);
                        }
                    }
                });
    });

});

    