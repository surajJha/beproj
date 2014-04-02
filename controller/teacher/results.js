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
        $("#s3").hide();
        $("#s4").hide();
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
                                                    subject: $("#subject").val()
                                                },
                                                success: function(data)
                                                {
                                                    $("#myContent").html("<div class=\"row\" id=\"c1\"><br><br></div><div class=\"row\" id=\"c2\"></div>");
                                                    columnDrilldown_StudentWiseSubjectTestPerformance(data);

                                                }
                                            });


                                    $.ajax(
                                            {
                                                type: 'GET',
                                                data: {f: 'subn',
                                                    std: c.substring(0, p),
                                                    div: c.substring(p + 1),
                                                    subject: $("#subject").val()},
                                                url: '../../model/teacher/results.php',
                                                success: function(data)
                                                {
                                                    pieChart_StudentNegativePerformance(data);
                                                }
                                            })
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
                                bar_class(data);
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
    //*****************************************************************************************


    function columnDrilldown_StudentWiseSubjectTestPerformance(data)
    {

        var student = [];
        var test_array = [];
        var counter = 0;
        var user_id = [];
        var student_array = [];
        var overall_marks = [];
        $.each(data, function()
        {
            var name = this.fname + " " + this.lname;
            var index = $.inArray(name, student_array);
            if (index == -1)
            {
                user_id.push(this.user_id);
                student_array.push(name);
                test_array.push({
                    name: name,
                    id: name,
                    data: []
                });
                index = counter++;
                overall_marks.push({
                    marks_obtained: 0.0,
                    total_marks: 0.0});
            }

            test_array[index].data.push([
                this.test_name,
                parseFloat(this.marks_obtained / this.total_marks * 100)
            ]);
            overall_marks[index].marks_obtained += parseFloat(this.marks_obtained);
            overall_marks[index].total_marks += parseFloat(this.total_marks);
        });
        $.each(student_array, function(index, v)
        {
            student.push({
                name: "",
                user_id: user_id[index],
                y: parseFloat(overall_marks[index].marks_obtained / overall_marks[index].total_marks * 100),
                drilldown: v,
                name2: v

            });
        });
        MySort(student, student.length);
        $.each(student_array, function(index, v)
        {
            student[index].name += index + 1;

        });

        options = {
            chart: {
                type: 'column',
                renderTo: 'c1'
            },
            title: {
                text: 'Subject Report'
            },
            subtitle: {
                text: "Click the columns to view a student's performance in an individual test."
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total Percentage'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: false,
                        format: '{point.y:.1f}%'
                    }
                }
            },
            tooltip: {
                //headerFormat: '<span style="font-size:11px"></span><br>',
                pointFormat: '<span style="color:{point.color}">{point.user_id}</span>:<b> {point.name2}</b> <b> {point.y:.2f}%</b><br/>'
            },
            series: [{
                    name: 'Previous Page',
                    colorByPoint: true,
                    data: student
                }],
            drilldown: {
                series: test_array
            }
        }
        var chart = new Highcharts.Chart(options);

        function MySort(array, n)
        {
            for (var c = 0; c < (n - 1); c++) {
                for (var d = 0; d < n - c - 1; d++) {
                    if (array[d].y < array[d + 1].y) /* For descending order use < */
                    {
                        var swap = array[d];
                        array[d] = array[d + 1];
                        array[d + 1] = swap;
                    }
                }
            }
        }
    }

//****************************************************************************************************


//***********************************************************************************

    function pieChart_StudentNegativePerformance(data)
    {
        var options = {
            chart: {
                renderTo: 'c2',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Topic wise error distribution'
            },
            tooltip: {
                pointFormat: ' <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                    type: 'pie',
                    name: '',
                    data: []
                }]
        };
        $.each(data, function(i)
        {
            options.series[0].data.push([this.topic_name, parseFloat(this.c)]);
        });

        var chart = new Highcharts.Chart(options);
    }

//*******************************************************************************************************
    function bar_class(data)
    {
        var options = {
            chart: {
                renderTo: 'myContent',
                type: 'bar',
                marginRight: 200

            },
            title: {
                text: 'Class Performance Summary'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [],
                title: {
                    text: 'Student'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Percentage',
                },
                max: 100,
                min: 0,
                        labels: {
                            overflow: 'justify'
                        }
            },
            tooltip: {
                valueSuffix: ''
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: false
                    },
                    pointPadding: .2,
                    groupPadding: .1
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: []
        }
        var counter = 0;
        var subject_array = [];
        var test_array = [];
        $.each(data, function()
        {
            var name = this.fname + " " + this.lname;
            if ($.inArray(name, options.xAxis.categories) == -1)
            {
                options.xAxis.categories.push(name);
            }
            var index = $.inArray(this.subject_name, subject_array);
            if (index == -1)
            {
                subject_array.push(this.subject_name);
                options.series.push({
                    name: this.subject_name,
                    data: []
                });
                index = counter++;
            }
            
            //round off not working
            options.series[index].data.push(Math.round((parseFloat(this.marks_obtained) / parseFloat(this.total_marks)) * 100, 2));
        });

        var chart = new Highcharts.Chart(options);
        
        //how to display the full chart ?
        chart.setSize(1250, 2500,0);
    }

//******************************************************************************************************
});