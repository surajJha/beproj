$(document).ready(function() {


    
    /*$.ajax({
        type: 'GET',
        data: {f:c1}, 
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
    */
    $.ajax({
        type: 'GET',
        data: {f:c2},
        url: '../../model/student/testcharts.php',
        success: function(data)
        {
            LineChart_studentAnnualPerformance(data);
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
            console.log(entry.name);
            $.each(data, function(j, value)
            {
                if (this.test_name == entry.name)
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


//**********************************************************************************

    function LineChart_studentAnnualPerformance(data)
    {

        var options = {
            chart: {
                renderTo: 'c2',
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


        var sub_array = [];

        $.each(data, function()
        {
            if (!$.inArray(data.test_name, options.xAxis.categories))
            {
                options.xAxis.categories.push(data.test_name);
            }
            if (!$.inArray(data.subject_name, sub_array))
            {
                sub_array.push(data.subject_name);
            }
        });
        var test_counter;
        $.each(sub_array, function(i,value)
        {

            var entry = {name: "", data: []};
            test_counter=0;
            $.each(data, function(j)
            {
                if(value== data.subject_name)
                    {
                        if(options.xAxis.categories[counter]== data.test_name)
                           {
                               entry.data.push(parseFloat(data.marks_obtained/ data.total_marks *100));
                           }
                    }
            });
            entry.name= value;
            options.series.push(entry);

        });
        var chart = new Highcharts.Chart(options);

//check whether subject present in the array or not
       
    }
});