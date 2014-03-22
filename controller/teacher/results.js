$(document).ready(function()
{
    //***********************************
    //load select options
    //***********************************
    $("#s2").hide();
    $("#s3").hide();
    $("#s4").hide();

    //on criteria selection -> load s2 if required 
    $("#s1").change(function()
    {
        $("#s2").hide();
        $("#s3").hide();
        $("#s4").hide();

        $('#s1 option:contains("Select")').attr('disabled', 'disabled');


        $.ajax(
                {
                    type: 'GET',
                    url: '../../model/teacher/results.php',
                    data: {
                        f: 's2'
                    },
                    success: function(j)
                    {
                        var t = "<option>Select class</option>";

                        for (var i = 0; i < j.length; i++) {
                            t += '<option value="' + j[i] + '">' + j[i] + '</option>';
                        }

                        $("#s2").html(t);
                        $("#s2").show();
                    }
                });
    });

    $("#s2").change(function() {
        $('#s2 option:contains("Select")').attr('disabled', 'disabled');


        var x = $("#s1").val();
        if (x == "Test Performance Summary")
        {
            $.ajax(
                    {
                        type: 'GET',
                        url: '../../model/teacher/results.php',
                        data: {
                            f: 'test_codes'
                        },
                        success: function(j)
                        {
                            var t = "<select  required id=\"tc\" name=\"tc\" class=\"form-control\">";
                            t += "<option>Select Test Id</option>";

                            for (var i = 0; i < j.length; i++) {
                                t += '<option value="' + j[i] + '">' + j[i] + '</option>';
                            }

                            t += "</select>";
                            $("#s3").html(t);
                            $("#s3").show();

                            $("#tc").change(function() {
                                $('#tc option:contains("Select")').attr('disabled', 'disabled');

                                var g = "<button id=\"go_button\" type=\"submit\" class=\"btn btn-primary\">Go!</button>";
                                $("#s4").html(g);
                                $("#s4").show();

                                $("#go_button").click(function(e)
                                {
                                    var c = $("#s2").val();
                                    var p = c.indexOf('-');

                                    e.preventDefault();
                                    $.ajax(
                                            {
                                                type: 'GET',
                                                url: '../../model/teacher/results.php',
                                                data: {
                                                    f: 'tc',
                                                    std: c.substring(0, p),
                                                    div: c.substring(p + 1),
                                                    test_id: $("#tc").val()
                                                },
                                                success: function(data)
                                                {

                                                }
                                            });
                                });

                            });
                        }
                    });

        }
        else if (x == "Student Performance Summary")
        {
            var c = $("#s2").val();
            var p = c.indexOf('-');
            var std = c.substring(0, p);
            var div = c.substring(p + 1);

            $.ajax(
                    {
                        type: 'GET',
                        url: '../../model/teacher/results.php',
                        data: {
                            f: 'student',
                            std: std,
                            div: div
                        },
                        success: function(j)
                        {
                            var t = "<select  required id=\"student\" name=\"student\" class=\"form-control\">";
                            t += "<option>Select Student</option>";

                            for (var i = 0; i < j.length; i++) {
                                t += '<option value="' + j[i] + '">' + j[i] + '</option>';
                            }

                            t += "</select>";
                            $("#s3").html(t);
                            $("#s3").show();

                            $("#student").change(function() {
                                $('#student option:contains("Select")').attr('disabled', 'disabled');

                                var g = "<button id=\"go_button\" type=\"submit\" class=\"btn btn-primary\">Go!</button>";
                                $("#s4").html(g);
                                $("#s4").show();

                                $("#go_button").click(function(e)
                                {
                                    e.preventDefault();

                                    var s = $("#student").val();
                                    var q = s.indexOf('-');
                                    $.ajax(
                                            {
                                                type: 'GET',
                                                url: '../../model/teacher/results.php',
                                                data: {
                                                    f: 'sc',
                                                    std: std,
                                                    div: div,
                                                    user_id: s.substring(q + 2)
                                                },
                                                success: function(data)
                                                {

                                                }
                                            });
                                });

                            });
                        }
                    });
        }
        else if (x == "Subject Performance Summary")
        {

            var c = $("#s2").val();
            var p = c.indexOf('-');
            var std = c.substring(0, p);
            var div = c.substring(p + 1);

            $.ajax(
                    {
                        type: 'GET',
                        url: '../../model/teacher/results.php',
                        data: {
                            f: 'subject',
                            std: std,
                            div: div
                        },
                        success: function(j)
                        {
                            var t = "<select  required id=\"subject\" name=\"subject\" class=\"form-control\">";
                            t += "<option>Select Subject</option>";

                            for (var i = 0; i < j.length; i++) {
                                t += '<option value="' + j[i] + '">' + j[i] + '</option>';
                            }

                            t += "</select>";
                            $("#s3").html(t);
                            $("#s3").show();

                            $("#subject").change(function() {
                                $('#subject option:contains("Select")').attr('disabled', 'disabled');

                                var g = "<button id=\"go_button\" type=\"submit\" class=\"btn btn-primary\">Go!</button>";
                                $("#s4").html(g);
                                $("#s4").show();

                                $("#go_button").click(function(e)
                                {
                                    e.preventDefault();
                                    $.ajax(
                                            {
                                                type: 'GET',
                                                url: '../../model/teacher/results.php',
                                                data: {
                                                    f: 'subc',
                                                    std: c.substring(0, p),
                                                    div: c.substring(p + 1),
                                                    subj: $("#subject").val()
                                                },
                                                success: function(data)
                                                {

                                                }
                                            });
                                });

                            });
                        }
                    });
        }
        else
        {
            var g = "<button id=\"go_button\" type=\"submit\" class=\"btn btn-primary\">Go!</button>";
            $("#s3").html(g);
            $("#s3").show();

            var c = $("#s2").val();
            var p = c.indexOf('-');

            $("#go_button").click(function(e)
            {
                e.preventDefault();
                $.ajax(
                        {
                            type: 'GET',
                            url: '../../model/teacher/results.php',
                            data: {
                                f: 'cc',
                                std: c.substring(0, p),
                                div: c.substring(p + 1)
                            },
                            success: function(data)
                            {

                            }
                        });
            });

        }
    });

});