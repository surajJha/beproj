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
                t += "<tr> <td>" + (i + 1) + "</td><td>" + data[i].question_id + "</td><td>" + data[i].type + "</td><td><details><summary>" + data[i].question_desc + "</summary><br/>";
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


});
