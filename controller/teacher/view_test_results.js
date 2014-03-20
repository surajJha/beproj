$(document).ready(function()
{

    $("#error_message").hide();
    var f = 't';
    var test_id = $("p:first").text();
    $.ajax({
        type: 'GET',
        data: {f: f,
            test_id: test_id},
        url: '../../model/teacher/view_test_results.php',
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
        },
        error: function()
        {
            $("#error_message").show();
            $("#error_message").html("There was an error in retrieving the data. Please try again!");
        }
    });



    var f = 's';
    $.ajax({
        type: 'GET',
        data: {f: f,
            test_id: test_id},
        url: '../../model/teacher/view_test_results.php',
        success: function(data)
        {

            var t = "<hr/><div class=\"table-responsive\"><table class=\"table table-striped\"><caption><h4>Performance of Students</h4></caption>"
            t += "<thead><tr> <th>SNo.</th> <th>User_id</th> <th>Name</th><th>Percentage(%)</th></tr></thead>";

            for (var i = 0; i < data.length; i++)
            {

                if (data[i].p >= 40)
                {
                    t += "<tr><td>" + (i + 1) + "</td><td>" + data[i].user_id + "</td><td>" + data[i].fname + " " + data[i].lname + "</td>";
                    t += "<td>" + data[i].p + "</td></tr>";
                }
                else
                {
                    t += "<tr style=\"color:red\"><td>" + (i + 1) + "</td><td>" + data[i].user_id + "</td><td>" + data[i].fname + " " + data[i].lname + "</td>";
                    t += "<td >" + data[i].p + "</td></tr>";
                }
            }

            t += "</table></div>";
            $("#student_ranks").html(t);
        },
        error: function()
        {
            $("#error_message").show();
            $("#error_message").html("There was an error in retrieving the data. Please try again!");
        }
    });


    var f = 'q';
    $.ajax({
        type: 'GET',
        data: {f: f,
            test_id: test_id},
        url: '../../model/teacher/view_test_results.php',
        success: function(data)
        {

            var t = "<hr/><div class=\"table-responsive\"><table class=\"table table-striped\"><caption><h3>Questions</h3></caption>"
            t += "<thead><tr> <th>QNo.</th> <th>Topic</th> <th>Type</th><th>Description</th><th>Answer</th></tr></thead>";
            for (var i = 0; i < data.length; i++) {
                t += "<tr> <td>" + (i + 1) + "</td><td>" + data[i].topic_name + "</td><td>" + data[i].type + "</td><td><details><summary>" + data[i].question_desc + "</summary><br/>";
                if (data[i].type == "Mcq")
                {
                    t += "<p><b> A: </b> " + data[i].mcq['optionA'] + "&nbsp;&nbsp;&nbsp; <b>B:</b> " + data[i].mcq['optionB'] + " &nbsp; &nbsp; &nbsp; <b> C: </b> " + data[i].mcq['optionC'] + "&nbsp;&nbsp;&nbsp; <b>D:</b> " + data[i].mcq['optionD'] + " </p>";
                }
                t += "</details></td><td>" + data[i].answer + "</td></tr>";
            }
            t += "</table></div>";
            $("#question_details").html(t);
            //code for charts 
            /*
             * 
             * 
             */

        },
        error: function()
        {
            $("#error_message").show();
            $("#error_message").html("There was an error in retrieving the data. Please try again!");
        }
    });

    var f = "c1";
    $.ajax({
        type: 'GET',
        data: {f: f,
            test_id: test_id},
        url: '../../model/teacher/view_test_results.php',
        success: function(data)
        {
            if (data[1].pass > 0 || data[0].na > 0 || data[2].fail > 0)
            {
                pieChart(data);
            }
        },
        error: function()
        {
            $("#error_message").show();
            $("#error_message").html("There was an error in retrieving the data. Please try again!");
        }
    });

    var f = "c2";
    $.ajax({
        type: 'GET',
        data: {f: f,
            test_id: test_id},
        url: '../../model/teacher/view_test_results.php',
        success: function(data)
        {
            barChart(data);
        },
        error: function()
        {
            $("#error_message").show();
            $("#error_message").html("There was an error in retrieving the data. Please try again!");
        }
    });

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
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
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
                type: 'column'
            },
            title: {
                text: 'Question based Analysis'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
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
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
                    data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                }, {
                    name: 'Not Attempted',
                    data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                }, {
                    name: 'Correct',
                    data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

                }, {
                    name: 'Incorrect',
                    data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

                }]
        }


        var chart = new Highcharts.Chart(options);
    }


});
