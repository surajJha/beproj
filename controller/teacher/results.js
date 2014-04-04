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
                                    var t = "<div class=\"row\"><div class=\"col-lg-offset-2 col-lg-8\" id=\"test_summary\"></div><div class=\"row\"><div class=\"col-lg-3\" id=\"chart1\"></div><div class=\"col-lg-9\" id=\"chart2\"></div></div><div class=\"row\"><div class=\"col-lg-offset-2 col-lg-8\" id=\"student_ranks\"></div></div><div class=\"row\"><div class=\"col-lg-offset-2 col-lg-8\" id=\"question_details\"></div></div>";
                                    $("#myContent").html(t);

                                    /////*********************

                                    var f = 't';
                                    var test_id = $("#tc").val();
                                    $.ajax({
                                        type: 'GET',
                                        data: {f: f,
                                            test_id: test_id},
                                        url: '../../model/teacher/results.php',
                                        success: function(data)
                                        {
                                            var str = "<div class=\"page-header\"><center><h3>Test Result</h3></center></div>";
                                            str += "<div class=\"row\"><div class=\"col-lg-offset-2 col-lg-5\">";
                                            str += "<b>Test id : </b> " + test_id + "<br/>";
                                            str += "<b>Subject : </b> " + data.subject_name + "<br/>";
                                            str += "<b>Class : </b> " + data.standard + " - " + data.division + "<br/>";
                                            str += "</div><div class=\"col-lg-5\">";
                                            str += "<b>Date : </b> " + data.date + "<br/>";
                                            str += "<b>Duration : </b> " + data.duration + " mins<br/>";
                                            str += "</div></div>";
                                            str += "<hr>";
                                            $("#test_summary").html(str);
                                        }
                                    });

                                    var f = "c1";
                                    $.ajax({
                                        type: 'GET',
                                        data: {f: f,
                                            test_id: test_id},
                                        url: '../../model/teacher/results.php',
                                        success: function(data)
                                        {
                                            if (data[1].pass > 0 || data[0].na > 0 || data[2].fail > 0)
                                            {
                                                pieChart(data);
                                            }
                                        }
                                    });

                                    var f = "c2";
                                    $.ajax({
                                        type: 'GET',
                                        data: {f: f,
                                            test_id: test_id},
                                        url: '../../model/teacher/results.php',
                                        success: function(data)
                                        {
                                            barChart(data);
                                        }
                                    });

                                    /*
                                     var f = 's';
                                     $.ajax({
                                     type: 'GET',
                                     data: {f: f,
                                     test_id: test_id},
                                     url: '../../model/teacher/view_test_results.php',
                                     success: function(data)
                                     {
                                     
                                     }
                                     });
                                     */

                                    var f = 'q';
                                    $.ajax({
                                        type: 'GET',
                                        data: {f: f,
                                            test_id: test_id},
                                        url: '../../model/teacher/results.php',
                                        success: function(data)
                                        {

                                            var t = "<hr/><div class=\"table-responsive\"><table class=\"table table-striped\"><caption><h3>Questions</h3></caption>"
                                            t += "<thead><tr> <th>QNo.</th> <th>Topic</th> <th>Type</th><th>Description</th><th>Answer</th></tr></thead>";
                                            for (var i = 0; i < data.length; i++) {
                                                t += "<tr> <td>" + (i + 1) + "</td><td>" + data[i].question_id + "</td><td>" + data[i].type + "</td><td><details><summary>" + data[i].question_desc + "</summary><br/>";
                                                if (data[i].type == "Mcq")
                                                {
                                                    t += "<p><b> A: </b> " + data[i].mcq['optionA'] + "&nbsp;&nbsp;&nbsp; <b>B:</b> " + data[i].mcq['optionB'] + " &nbsp; &nbsp; &nbsp; <b> C: </b> " + data[i].mcq['optionC'] + "&nbsp;&nbsp;&nbsp; <b>D:</b> " + data[i].mcq['optionD'] + " </p>";
                                                }
                                                t += "</details></td><td>" + data[i].answer + "</td></tr>";
                                            }
                                            t += "</table></div>";
                                            $("#question_details").html(t);

                                        }
                                    });



                                    ///**************************
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
    }
    );
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
                        entry.data.push(Math.round(parseFloat(this.marks_obtained / this.total_marks * 100),2));
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
        chart.setSize(1250, 2500, 0);
    }
//********** charts for test-wise repeat *****************************************


    function pieChart(data)
    {
        var options = {
            chart: {
                renderTo: 'chart1',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Distribution of Test takers'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white',
                            textShadow: '0px 1px 2px black'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%']
                }
            },
            series: [{
                    type: 'pie',
                    name: '',
                    data: []
                }]
        };

        var t = data[1].pass + data[2].fail + data[0].na;
        var d = [];
        if (data[1].pass > 0)
        {
            d.push("Pass");
            d.push(data[1].pass / t);
            options.series[0].data.push(d);
        }
        if (data[2].fail > 0)
        {
            d = []
            d.push("Fail");
            d.push(data[2].fail / t);
            options.series[0].data.push(d);
        }
        if (data[0].na > 0)
        {
            d = []
            d.push("Not Appeared");
            d.push(data[0].na / t);
            options.series[0].data.push(d);
        }

        var chart = new Highcharts.Chart(options);
    }



    /****************************************************************************/
    /*
     * x -axis pe question ids
     * y - axis pe no of students
     * series mein - 4 series hai .. 
     * total , correct , incorrect and not answered ( this data should be question wise )
     */
    function barChart(data) {

        var options = {
            chart: {
                renderTo: 'chart2',
                type: 'column'
            },
            title: {
                text: 'Question based Analysis'
            },
            subtitle: {
                text: ''
            },
            xAxis: {title: {
                    text: 'Questions'
                },
                categories: [
                    //question ids
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'No. of students'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Total',
                    data: []

                }, {
                    name: 'Not Attempted',
                    data: []

                }, {
                    name: 'Correct',
                    data: []

                }, {
                    name: 'Incorrect',
                    data: []

                }]
        };



        var question = {question_id: "", t: 0, n: 0, i: 0, c: 0}; //t-> total, i->incorrect, c->correct
        var ar_question = $.makeArray(question);
        var counter = 0;
        var exist;


        ar_question[0].question_id = data[0].question_id;
        $.each(data, function()
        {
            exist = lookupfunction(ar_question, this.question_id);
            if (!exist) {
                counter++;
                ar_question.push({question_id: this.question_id, t: 0, n: 0, i: 0, c: 0});
                exist = ar_question[counter];
                //options.xAxis.categories.push(this.question_id);

            }


            //for total
            exist.t = exist.t + 1;

            //for answered
            if (this.response != null)
            {
                if (this.answer != this.response)
                {
                    exist.i = exist.i + 1;
                }

                if (this.answer == this.response)
                {
                    exist.c = exist.c + 1;
                }
            }
            else
            {
                exist.n = exist.n + 1;
            }
        });

        count = 0;
        $.each(ar_question, function()
        {
            count++;
            options.xAxis.categories.push(count);
            options.series[0].data.push(this.t);
            options.series[1].data.push(this.n);
            options.series[2].data.push(this.c);
            options.series[3].data.push(this.i);

        });
        function lookupfunction(ar_question, value)
        {
            for (var i = 0; i < (ar_question.length); i++) {

                if (ar_question[i].question_id == value)
                {
                    //alert(i);
                    return ar_question[i]; // Return as soon as the object is found

                }
            }

            return null; // The object was not found

        }


        var chart = new Highcharts.Chart(options);
    }

//******************************************************************************************************
});
