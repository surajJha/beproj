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
                                                columnBasic_studentPerformance(data);
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
                                            f: 'get_test_id',
                                            subj: $("#subject").val()
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

                                                    var t = "<div class=\"row\"><div class=\"col-lg-offset-2 col-lg-8\" id=\"test_summary\"></div><div class=\"row\"><div class=\"col-lg-3\" id=\"chart1\"></div><div class=\"col-lg-9\" id=\"chart2\"></div></div><div class=\"row\"><div class=\"col-lg-offset-2 col-lg-8\" id=\"student_ranks\"></div></div><div class=\"row\"><div class=\"col-lg-offset-2 col-lg-8\" id=\"question_details\"></div></div>";
                                                    $("#myContent").html(t);

                                                    /////*********************

                                                    var f = 't';
                                                    var test_id = $("#tc").val();
                                                    $.ajax({
                                                        type: 'GET',
                                                        data: {f: f,
                                                            test_id: test_id},
                                                        url: '../../model/student/results.php',
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
                                                            str += "<div class=\"row\" style=\"color: #006dcc\"><div class=\"col-lg-offset-2 col-lg-5\">";
                                                            str += "<b>Marks obtained: </b> " + data.marks_obtained + "<br/>";
                                                            str += "</div><div class=\"col-lg-5\">";
                                                            str += "<b>Total marks : </b> " + data.total_marks + "<br/>";
                                                            str += "</div></div><hr>";

                                                            $("#test_summary").html(str);
                                                        }
                                                    });




                                                    var f = 'q';
                                                    $.ajax({
                                                        type: 'GET',
                                                        data: {f: f,
                                                            test_id: test_id},
                                                        url: '../../model/student/results.php',
                                                        success: function(data)
                                                        {

                                                            var t = "<hr/><div class=\"table-responsive\"><table class=\"table table-striped\"><caption><h3>Questions</h3></caption>"
                                                            t += "<thead><tr> <th>Question No.</th> <th>Type</th><th>Description</th><th>Your Response</th><th>Correct Answer</th></tr></thead>";

                                                            for (var i = 0; i < data.length; i++) {
                                                                t += "<tr> <td>" + (i + 1) + "</td><td>" + data[i].type + "</td><td><details><summary>" + data[i].question_desc + "</summary><br/>";
                                                                if (data[i].type == "Mcq")
                                                                {
                                                                    t += "<p><b> A: </b> " + data[i].mcq['optionA'] + "&nbsp;&nbsp;&nbsp; <b>B:</b> " + data[i].mcq['optionB'] + " &nbsp; &nbsp; &nbsp; <b> C: </b> " + data[i].mcq['optionC'] + "&nbsp;&nbsp;&nbsp; <b>D:</b> " + data[i].mcq['optionD'] + " </p>";
                                                                }
                                                                t += "</details></td><td>" + data[i].response + "</td><td>" + data[i].answer + "</td></tr>";
                                                            }
                                                            t += "</table></div>";
                                                            $("#question_details").html(t);


                                                            //*********************Charts*******************          
                                                            barChart_topicWisePerformance(data);
                                                            pieChart_topicWisePerformance(data);


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
    //*****************************************************************************

    function columnBasic_studentPerformance(data)
    {


        options = {
            chart: {
                renderTo: 'myContent',
                type: 'column'
            },
            title: {
                text: 'Student Performance'
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Percentage(%)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="font-size:10px; color:{series.color};">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
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
            series: []
        };

        var subject = [];
        var test = [];
        var count_test = 0;
        $.each(data, function()
        {
            if ($.inArray(this.test_name, test) == -1)
            {
                test.push(this.test_name);
            }
            if ($.inArray(this.subject_name, options.xAxis.categories) == -1)
            {
                options.xAxis.categories.push(this.subject_name);
            }
        });

        $.each(test, function(i, v)
        {
            var entry = {
                name: v,
                data: []
            };
            $.each(data, function()
            {
                if (this.test_name == v)
                {
                    entry.data.push(parseFloat(this.percent));
                }

            });
            console.log(entry.data);
            options.series.push(entry);
        });
        var chart = new Highcharts.Chart(options);
    }



//******************************************************************************


    //*************** BAR CHART ********************

    function barChart_topicWisePerformance(data)
    {

        var options = {
            chart: {
                renderTo: 'chart2',
                type: 'column'
            },
            title: {
                text: 'Topic-wise Performance'
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'No of questions'
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
            series: []
        };




        var topics = {topic: "", t: 0, i: 0, c: 0}; //t-> total, i->incorrect, c->correct
        var ar_topics = $.makeArray(topics);
        options.xAxis.categories.push(data[0].topic_name);
        var counter = 0;
        var exist;
        $.each(data, function()
        {
            if (!ar_topics[0].topic)
            {
                ar_topics[0].topic = this.topic_name;
            }

            exist = lookupfunction(this.topic_name, ar_topics);
            if (!exist) {
                counter++;
                ar_topics.push({topic: this.topic_name, t: 0, i: 0, c: 0});
                exist = ar_topics[counter];
                options.xAxis.categories.push(this.topic_name);

            }


            //for total
            exist.t = exist.t + 1;
            //////console.log("exist.t", exist.t);
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


        });
        ////console.log(options.xAxis.categories);


        //top= top.split('\n');
        var total = {
            name: 'Total',
            data: []
        };
        var ans = {
            name: 'Answered',
            data: []
        };
        var c_ans = {
            name: 'Correctly',
            data: []
        };
        var inc_ans = {
            name: 'Incorrectly Answered ',
            data: []
        };
        $.each(ar_topics, function(index, value)
        {
            total.data.push(parseFloat(this.t));
            c_ans.data.push(parseFloat(this.c));
            inc_ans.data.push(parseFloat(this.i));
            ans.data.push(parseFloat(this.c + this.i));
        });

        options.series.push(total);
        options.series.push(ans);
        options.series.push(c_ans);
        options.series.push(inc_ans);
        //console.log(options.series);


        var chart = new Highcharts.Chart(options);

    }


    //****************find object in list***************
    function lookupfunction(topic_name, ar_topics)
    {
        for (var i = 0, len = ar_topics.length; i < len; i++) {

            if (ar_topics[i].topic == topic_name)
            {
                return ar_topics[i]; // Return as soon as the object is found

            }
        }

        return null; // The object was not found

    }

    //******************PIE CHART***********************


    function pieChart_topicWisePerformance(data)
    {
        var options = {
            chart: {
                renderTo: 'chart1',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Topic Distribution'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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


        var topics = {topic: "", t: 0, c: 0}; //t-> total, i->incorrect, c->correct

        var ar_topics = $.makeArray(topics);

        var counter = 0;
        var exist;
        $.each(data, function()
        {
            if (!ar_topics[0].topic)
            {

                ar_topics[0].topic = this.topic_name;
            }

            exist = lookupfunction(this.topic_name, ar_topics);
            if (!exist) {
                counter++;
                ar_topics.push({topic: this.topic_name, t: 0, c: 0});
                exist = ar_topics[counter];

            }


            //for total
            exist.t = exist.t + 1;

            /*//console.log("exist.t", exist.t);
             //for answered
             if (this.response != null)
             {
             if (this.answer != this.response)
             {
             exist.i = exist.i + 1;
             }
             */
            if (this.answer == this.response)
            {
                exist.c = exist.c + 1;
            }
            //}

        });


        var d = [];

        console.log(ar_topics);
        var total = 0;
        $.each(ar_topics, function(index, value)
        {
            total += this.t;
        });
        $.each(ar_topics, function(index, value)
        {
            var d = [];
            d.push("" + this.topic);
            d.push((parseFloat(this.t) / parseFloat(total)) * 100);
            console.log(parseFloat(this.t) / parseFloat(total) * 100);
            options.series[0].data.push(d);
        });

        //console.log(options.series[0].data);
        var chart = new Highcharts.Chart(options);
    }

});