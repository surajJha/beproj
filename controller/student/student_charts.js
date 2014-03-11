/*  
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $("#test").click(function() {

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/student/s_charts.php',
                    cache: false,
                    success: function(data)
                    {
                        //alert("success");
                        var d = "check this out";
                        if (data.length == 0)
                            alert("reponse empty");
                        barChart_topicWisePerformance(data);
                        pieChart_topicWisePerformance(data);

                    },
                    error: function(data)
                    {
                        alert("json error function");
                    }
                });
        return false;
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




        var topics = {topic: data[0].topic_name, t: 0, i: 0, c: 0}; //t-> total, i->incorrect, c->correct
        var ar_topics = $.makeArray(topics);
        options.xAxis.categories.push(data[0].topic_name);
        var counter = 0;
        var exist;
        $.each(data, function()
        {
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
       