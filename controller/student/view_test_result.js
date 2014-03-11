$(document).ready(function() {

    $("#error_message").hide();
    var f = 'test_summary';
    var test_id = $("p:first").text();

    $.ajax({
        type: 'GET',
        data: {f: f,
            test_id: test_id},
        url: '../../model/student/view_test_result.php',
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
        },
        error: function()
        {
            $("#error_message").show();
            $("#error_message").html("There was an error in retrieving the data. Please try again!");
        }
    });


    var f = 'question_details';
    $.ajax({
        type: 'GET',
        data: {f: f,
            test_id: test_id},
        url: '../../model/student/view_test_result.php',
        success: function(data)
        {

            var t = "<hr/><div class=\"table-responsive\"><table class=\"table table-striped\"><caption><h3>Question Bank</h3></caption>"
            t += "<thead><tr> <th>Question No.</th> <th>Type</th><th>Description</th><th>Your Response</th><th>Correct Answer</th></tr></thead>";

            for (var i = 0; i < data.length; i++) {
                t += "<tr> <td>" + (i+1) + "</td><td>" + data[i].type + "</td><td><details><summary>" + data[i].question_desc + "</summary><br/>";
                if (data[i].type == "Mcq")
                {
                    t += "<p><b> A: </b> " + data[i].mcq['optionA'] + "&nbsp;&nbsp;&nbsp; <b>B:</b> " + data[i].mcq['optionB'] + " &nbsp; &nbsp; &nbsp; <b> C: </b> " + data[i].mcq['optionC'] + "&nbsp;&nbsp;&nbsp; <b>D:</b> " + data[i].mcq['optionD'] + " </p>";
                }
                t += "</details></td><td>"+data[i].response +"</td><td>"+data[i].answer + "</td></tr>";
            }
            t += "</table></div>";
            $("#question_details").html(t);
            
            
  //*********************Charts*******************          
            barChart_topicWisePerformance(data);
            pieChart_topicWisePerformance(data);

        },
        error: function()
        {
            $("#error_message").show();
            $("#error_message").html("There was an error in retrieving the data. Please try again!");
        }
    });
    
    
    
    //******* CHART to show question attempted and correctly answered topic wise*********

    //*************** BAR CHART ********************

    function barChart_topicWisePerformance(data)
    {

        var options = {
            chart: {
                renderTo: 'chart1',
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
                        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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




        var topics = {topic:"", t: 0, i: 0, c: 0}; //t-> total, i->incorrect, c->correct
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
                renderTo: 'chart2',
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



    return false;
});
       