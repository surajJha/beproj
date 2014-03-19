$(document).ready(function() {


   
    $.ajax({
        type: 'GET',
        url: '../../model/student/testcharts.php',
        success: function(data)
        {
            polar_spider(data);
        },
        error: function()
        {
            alert("Error");
        }
    });


    //subject wise performance of student
    function polar_spider(data)
    {
        var options = {
            chart: {
                polar: true,
                type: 'line',
                renderTo: 'c1'
            },
            title: {
                text: 'Subject-wise performance',
                x: -80
            },
            pane: {
                size: '80%'
            },
            xAxis: {
                categories: [],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0
            },
            tooltip: {
                shared: true,
                pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}%</b><br/>'
            },
            legend: {
                align: 'right',
                verticalAlign: 'top',
                y: 70,
                layout: 'vertical'
            },
            series: []

        }

        var ar_subjects = [];
        var ar_test_name = [];

        $.each(data, function()
        {


            if (!ar_subjects[0])
            {
                ar_subjects[0] = this.subject_name;
                options.xAxis.categories.push(this.subject_name);
            }
            if ($.inArray(this.subject_name, ar_subjects) == -1)
            {
                ar_subjects.push(this.subject_name);
                options.xAxis.categories.push(this.subject_name);
            }

            if (!ar_test_name[0])
            {
                ar_test_name[0] = this.test_name;
                //options.xAxis.categories.push(this.test_name);
            }
            if ($.inArray(this.test_name, ar_test_name) == -1)
            {
                ar_test_name.push(this.test_name);
                //options.xAxis.categories.push(this.test_name);
            }

        });

       
        
      
        $.each(ar_test_name, function(i,v)
        {
            var entry = {name: "", data: [],pointPlacement: 'on'};
            entry.name = v;
            entry.data=[];
            console.log(entry.name);
            $.each(data, function(j, value)
            {
                  if(this.test_name== entry.name)
                  {
                      entry.data.push(parseFloat(this.percent));
                      console.log(entry.data);
                  }
            });
             options.series.push(entry);
             console.log(options.series);
            
        });
        var chart = new Highcharts.Chart(options);

    }


    /* function barChart_topicWisePerformance(data)
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
     
     }*/

});