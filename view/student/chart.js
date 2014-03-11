/// THIS IS A JAVASCRIPT FILE BASICALLY 
$(document).ready(function() {
    $("#mychart").click(function() {
        //e.preventDefault();

        $.ajax(
                {
                    type: 'POST',
                    url: '../../model/student/student_chart.php',
                    cache: false,
                    success: function(data)
                    {
                        if (data == "error" || data == '')
                        {
                            $("#chart").html("No Chart Available");
                        }
                        else
                        {
                            $(function() {
                                $('#chart').highcharts({
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Test Analysis',
                                        allowDecimals: false,
                                        min: 0,
                                        title: {
                                            text: 'Number of Questions'
                                        }
                                    },
                                    tooltip: {
                                        formatter: function() {
                                            return '<b>' + this.x + '</b><br/>' +
                                                    this.series.name + ': ' + this.y + '<br/>' +
                                                    'Total: ' + this.point.stackTotal;
                                        }
                                    },
                                    plotOptions: {
                                        column: {
                                            stacking: 'normal'
                                        }
                                    },
                                    series: data
                                });
                            });
                        }

                    },
                    error: function() {
                        alert("error");
                    }
                });
        return false;
    });
});

