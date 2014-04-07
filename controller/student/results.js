$(document).ready(function() {
    $("#s2").hide();
    $("#s3").hide();

    $("#s1").change(function()
    {
        $("#s2").hide();
        $("#s3").hide();
        $('#s1 option:contains("Select")').attr('disabled', 'disabled');

        var v = $("#s1").val();

        if (v == "My Performance Summary")
        {
            var g = "<button id=\"go_button\" type=\"submit\" class=\"btn btn-primary\">Go!</button>";
            $("#s2").html(g);
            $("#s2").show();

            $("#go_button").click(function(e)
            {
                e.preventDefault();

                $.ajax(
                        {
                            type: 'GET',
                            url: '../../model/student/results.php',
                            data: {
                                f: 'my'
                            },
                            success: function(data)
                            {
                                lineChart_TestWiseAnnualPerformance(data);
                            }
                        });
            });

        }
        else
        {
            $.ajax({
                type: 'GET',
                url: '../../model/student/results.php',
                data: {
                    f: 'get_subject'
                },
                success: function(j)
                {
                    var t = "<select  required id=\"subject\" name=\"subject\" class=\"form-control\">";
                    t += "<option>Select Subject</option>";

                    for (var i = 0; i < j.length; i++) {
                        t += '<option value="' + j[i] + '">' + j[i] + '</option>';
                    }

                    t += "</select>";
                    $("#s2").html(t);
                    $("#s2").show();

                    $("#subject").change(function() {
                        $('#subject option:contains("Select")').attr('disabled', 'disabled');

                        //display subject summary
                        if (v == "Subject Performance Summary")
                        {

                            var g = "<button id=\"go_button\" type=\"submit\" class=\"btn btn-primary\">Go!</button>";
                            $("#s3").html(g);
                            $("#s3").show();


                            $("#go_button").click(function(e)
                            {
                                e.preventDefault();

                                $.ajax(
                                        {
                                            type: 'GET',
                                            url: '../../model/student/results.php',
                                            data: {
                                                f: 'subject'
                                            },
                                            success: function(data)
                                            {
                                                //lineChart_TestWiseAnnualPerformance(data);
                                            }
                                        });
                            });

                        }
                        //get test_coddes
                        else
                        {

                            $.ajax(
                                    {
                                        type: 'GET',
                                        url: '../../model/student/results.php',
                                        data: {
                                            f: 'get_test_id'
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
                                                    e.preventDefault();

                                                    $.ajax(
                                                            {
                                                                type: 'GET',
                                                                url: '../../model/student/results.php',
                                                                data: {
                                                                    f: 'subject'
                                                                },
                                                                success: function(data)
                                                                {
                                                                    //lineChart_TestWiseAnnualPerformance(data);
                                                                }
                                                            });
                                                });

                                            });

                                        }
                                    });
                        }
                    });
                }
            });
        }

    });


    //********************************************************************************888
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
            if ($.inArray(this.test_name, options.xAxis.categories) == -1)
            {
                options.xAxis.categories.push(this.test_name);
            }
            if ($.inArray(this.subject_name, sub_array) == -1)
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
                        entry.data.push(Math.round(parseFloat(this.marks_obtained / this.total_marks * 100), 2));
                    }
                }
            });
            entry.name = value;
            options.series.push(entry);

        });
        console.log(options.series);
        var chart = new Highcharts.Chart(options);
    }
    //*****************************************************************************************

});