$(document).ready(function() {


    var f = 'c1';
        $.ajax({
     type: 'GET',
     data: {f:f}, 
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
     
    f = 'c2';
    $.ajax({
        type: 'GET',
        data: {f: f},
        url: '../../model/student/testcharts.php',
        success: function(data)
        {
            LineChart_studentAnnualPerformance(data);
        },
        error: function()
        {
            alert("Error c2");
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

        options.xAxis.categories.push(data[0].test_name);
        var sub_array = [];
       
        sub_array.push(data[0].subject_name);



        $.each(data, function()
        {
            if (lookupfunction(options.xAxis.categories, this.test_name)==0)
            {
                options.xAxis.categories.push(this.test_name);
            }
            if (lookupfunction(sub_array, this.subject_name)==0)
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

//check whether subject present in the array or not

        function lookupfunction(ar, value)
        {
            var x=0;
            $.each(ar, function(i,v) {
                if (v == value)
                {
                    x=1;
                }
                
            });

            return x; // The object was not found

        }
    }
});