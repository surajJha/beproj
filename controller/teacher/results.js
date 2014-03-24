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
                                                    lineChart_TestWiseAnnualPerformance(data);
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



//**********************************************************
 function lineChart_TestWiseAnnualPerformance(data)
    {

        var options = {
            chart: {
                renderTo: 'myContent'
            },
            title: {
                text: 'Annual Performance',
                x: -20 //center
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                max: 100,
                min: 0,
                title: {
                    text: 'Percentage(%)'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: '%'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: []
        };

        //options.xAxis.categories.push(data[0].test_name);
        var sub_array = [];

        //sub_array.push(data[0].subject_name);



        $.each(data, function()
        {
            if ($.inArray(this.test_name,options.xAxis.categories )== -1)
            {
                options.xAxis.categories.push(this.test_name);
            }
            if ($.inArray(this.subject_name,sub_array) == -1)
            {

                sub_array.push(this.subject_name);
            }
        });

        console.log(options.xAxis.categories);
        console.log(sub_array);


        $.each(sub_array, function(i, value)
        {

            var entry = {name: "", data: []};
            test_counter = 0;
            $.each(data, function(j)
            {
                if (value == this.subject_name)
                {
                    console.log("in");
                    if (options.xAxis.categories[test_counter] == this.test_name)
                    {
                        test_counter++;
                        entry.data.push(parseFloat(this.marks_obtained / this.total_marks * 100));
                    }
                }
            });
            entry.name = value;
            options.series.push(entry);

        });
        console.log(options.series);
        var chart = new Highcharts.Chart(options);
    }
 //*****************************************************************************************8
});