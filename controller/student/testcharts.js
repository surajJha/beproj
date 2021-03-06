$(document).ready(function() {

    /*
     var f = 'c1';
     $.ajax({
     type: 'GET',
     data: {f: f},
     url: '../../model/student/testcharts.php',
     success: function(data)
     {
     polar_spider(data);
     },
     error: function()
     {
     alert("Error c1");
     }
     });
     */

    /*
     f = 'c2';
     $.ajax({
     type: 'GET',
     data: {f: f},
     url: '../../model/student/testcharts.php',
     success: function(data)
     {
     lineChart_TestWiseAnnualPerformance(data);
     },
     error: function()
     {
     alert("Error c2");
     }
     });
     
     */

    /*
     for one subject only
     f = 'c3';
     $.ajax({
     type: 'GET',
     data: {f: f},
     url: '../../model/student/testcharts.php',
     success: function(data)
     {
     barBasic_StudentWiseAnnualPerformance(data);
     },
     error: function()
     {
     alert("Error c3");
     }
     })*/

    /*
     f = 'c4';
     $.ajax({
     type: 'GET',
     data: {f: f},
     url: '../../model/student/testcharts.php',
     success: function(data)
     {
     //alert(data);
     columnDrilldown_StudentWiseSubjectTestPerformance(data);
     },
     error: function()
     {
     alert("Error c4");
     }
     });
     
     */

    /*
     f = 'c5';
     $.ajax({
     type: 'GET',
     data: {f: f},
     url: '../../model/student/testcharts.php',
     success: function(data)
     {
     //alert(data);
     barBasic_StudentWiseSubjectAnnualPerformance(data);
     },
     error: function()
     {
     alert("Error c5");
     }
     });
     */

    /*
     f = 'c6';
     $.ajax({
     type: 'GET',
     data: {f: f},
     url: '../../model/student/testcharts.php',
     success: function(data)
     {
     pieChart_StudentNegativePerformance(data);
     },
     error: function()
     {
     alert("Error c6");
     }
     })
     */

    /*var f = 'c7';
     $.ajax({
     type: 'GET',
     data: {f: f},
     url: '../../model/student/testcharts.php',
     success: function(data)
     {
     columnBasic_OverallPerformance(data);
     },
     error: function()
     {
     alert("Error c7");
     }
     });
     */
    /*
     var f = 'c8';
     $.ajax({
     type: 'GET',
     data: {f: f},
     url: '../../model/student/testcharts.php',
     success: function(data)
     {
     barBasic_testPerformance(data);
     },
     error: function()
     {
     alert("Error c7");
     }
     });*/

    var f = 'c9';
    $.ajax({
        type: 'GET',
        data: {f: f},
        url: '../../model/student/testcharts.php',
        success: function(data)
        {
            columnBasic_studentPerformance(data);
        },
        error: function()
        {
            alert("Error c9");
        }
    });
//*****************************************************************************

    function columnBasic_studentPerformance(data)
    {


        options = {
            chart: {
                renderTo: 'c9',
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
                pointFormat: '<tr><td style="font-size:20px; color:{series.color};">{series.name}: </td>' +
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
    function barBasic_testPerformance(data)
    {
        var options = {
            chart: {
                renderTo: 'c8',
                type: 'bar',
                marginRight: 200

            },
            title: {
                text: 'Test performance'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [],
                title: {
                    text: 'Student Names'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Marks'
                },
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
            series: [
                {
                    name: "Marks Obtained",
                    data: []
                }
            ]
        };

        options.yAxis.max = data[0].total_marks;


        $.each(data, function()
        {
            options.xAxis.categories.push(this.lname + " " + this.fname);
            options.series[0].data.push(parseFloat(this.marks_obtained));
        });

        var chart = new Highcharts.Chart(options);
    }




//******************************************************************************
    function barBasic_StudentWiseSubjectAnnualPerformance(data)
    {
        var options = {
            chart: {
                renderTo: 'c5',
                type: 'bar',
                marginRight: 200

            },
            title: {
                text: 'Subject performance'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [],
                title: {
                    text: 'Student Names'
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
            options.series[index].data.push((parseFloat(this.marks_obtained) / parseFloat(this.total_marks)) * 100);
        });
        //console.log(options.xAxis.categories);
        //console.log(options.series);


        var chart = new Highcharts.Chart(options);
        chart.setSize(1200, 1500);
    }









//******************************************************************************    

    function barBasic_StudentWiseAnnualPerformance(data)
    {
        var options = {
            chart: {
                renderTo: 'c3',
                type: 'bar',
                marginRight: 160

            },
            title: {
                text: 'Student wise annual performance'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [],
                overflow: 'justify',
                title: {
                    text: 'Student Names'
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
                    pointPadding: .2,
                    groupPadding: .1,
                    dataLabels: {
                        enabled: false
                    }
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
        var test_array = [];
        $.each(data, function()
        {
            var name = this.fname + " " + this.lname;
            if ($.inArray(name, options.xAxis.categories) == -1)
            {
                options.xAxis.categories.push(name);
            }
            var index = $.inArray(this.test_name, test_array);
            if (index == -1)
            {
                test_array.push(this.test_name);
                var entry = {name: this.test_name, data: []};
                options.series.push(entry);
                index = counter++;
            }
            options.series[index].data.push(Math.round(parseFloat((this.marks_obtained / this.total_marks) * 100)));
        });
        //console.log(options.series);
        var chart = new Highcharts.Chart(options);
        chart.setSize(1200, 1000);
    }

//*******************************************************************************    
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

        var ar_subject = [];
        var ar_test_name = [];
        $.each(data, function()
        {


            if (!ar_subject[0])
            {
                ar_subject[0] = this.subject_name;
                options.xAxis.categories.push(this.subject_name);
            }
            if ($.inArray(this.subject_name, ar_subject) == -1)
            {
                ar_subject.push(this.subject_name);
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
        $.each(ar_test_name, function(i, v)
        {
            var entry = {name: "", data: [], pointPlacement: 'on'};
            entry.name = v;
            entry.data = [];
            //console.log(entry.name);
            $.each(data, function(j, value)
            {
                if (this.test_name == entry.name)
                {
                    entry.data.push(parseFloat(this.percent));
                    //console.log(entry.data);
                }
            });
            options.series.push(entry);
            //
            //console.log(options.series);

        });
        var chart = new Highcharts.Chart(options);
    }


//**********************************************************************************
//student Annual performance
    function lineChart_TestWiseAnnualPerformance(data)
    {

        var options = {
            chart: {
                renderTo: 'c2'
            },
            title: {
                text: 'Annual Performance',
                x: -20 //center
            },
            subtitle: {
                text: 'Line Chart',
                x: -20
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
                valueSuffix: '°C'
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
        //console.log(options.xAxis.categories);
        //console.log(sub_array);


        $.each(sub_array, function(i, value)
        {

            var entry = {name: "", data: []};
            test_counter = 0;
            $.each(data, function(j)
            {
                if (value == this.subject_name)
                {
//console.log("in");
                    if (options.xAxis.categories[test_counter] == this.test_name)
                    {
                        test_counter++;
                        entry.data.push(Math.round(parseFloat(this.marks_obtained / this.total_marks * 100)));
                    }
                }
            });
            entry.name = value;
            options.series.push(entry);
        });
        //console.log(options.series);
        var chart = new Highcharts.Chart(options);
    }

    //*****************************************************************************

    function pieChart_StudentNegativePerformance(data)
    {
        var options = {
            chart: {
                renderTo: 'c6',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
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
                    name: 'Browser share',
                    data: []
                }]
        };
        $.each(data, function(i)
        {
            options.series[0].data.push([this.topic_name, parseFloat(this.c)]);
        });
        //console.log(options.series[0].data);

        var chart = new Highcharts.Chart(options);
    }


//******************************************************************************


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
                renderTo: 'c4'
            },
            title: {
                text: 'Overall Percentage'
            },
            subtitle: {
                text: "Click the columns to view Student's Test Wise Percentage"
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
        //console.log(student);
        var chart = new Highcharts.Chart(options);
        //console.log(array[2]);

    }

    function MySort(array, n)
    {
        for (var c = 0; c < (n - 1); c++) {
            for (var d = 0; d < n - c - 1; d++) {
                if (array[d].y < array[d + 1].y) /* For descending order use < */
                {
                    //console.log("check" + c);
                    var swap = array[d];
                    array[d] = array[d + 1];
                    array[d + 1] = swap;
                }
            }
        }

    }






//*********************************************************************************

    function columnBasic_OverallPerformance(data)
    {
        var student = [];
        $.each(data[0], function(i)
        {

            //options.xAxis.categories.push((i + 1));
            //options.series[0].data.push(parseFloat(this.percent));
            student.push({
                drilldown: this.user_id,
                name: "",
                name2: (this.fname + " " + this.lname),
                y: parseFloat(this.percent),
                user_id: this.user_id
            });
        });
        MySort(student, student.length);
        $.each(student, function(index, v)
        {
            this.name += index + 1;
        });
        var counter = 0;
        var u_array = [];
        var test_array = [];
        $.each(data[1], function() {
            var index = $.inArray(this.user_id, u_array);
            if (index == -1)
            {
                u_array.push(this.user_id);
                test_array.push({
                    name: this.user_id,
                    id: this.user_id,
                    data: []
                });
                index = counter++;
            }
            test_array[index].data.push([this.test_name, parseFloat(this.percent)]);
        });
        //console.log(student);
        //console.log(test_array);


        options = {
            chart: {
                type: 'column',
                renderTo: 'c7'
            },
            title: {
                text: 'Overall Percentage'
            },
            subtitle: {
                text: "Click the columns to view Student's Test Wise Percentage"
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
        };
        var chart = new Highcharts.Chart(options);
    }

});
