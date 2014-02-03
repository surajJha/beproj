<body>
        
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class =" container">
                <a href="#" class =" navbar-brand">HexaGraph</a>
            </div>
        </div>

        <!-- PAGE TITLE GOES HERE ************************************ -->
        <div class="container">
            <div> 

                <div style="padding: 5%">

                    <div class="row">
                        <center>
                            <h3>Test Result</h3>
                        </center>
                    </div>

                    <hr/>

                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-5">
                            <b>Test id : </b> 16<br/>                            <b>Subject : </b> Math<br/>                            <b>Class : </b> 9 - A<br/>                        </div> 

                        <div class="col-lg-offset-1 col-lg-5">
                            <b>Date : </b> 2014-01-31<br/>                            <b>Duration : </b> 10 minutes<br/>                        </div>
                    </div>



                    <div class="row" style="color: green">
                        <div class="col-lg-offset-1 col-lg-5">
                            <b>
                                Marks Obtained : 1 
                            </b>
                        </div>

                        <div class="col-lg-offset-1 col-lg-5">
                            <b>
                                Total Marks : 5                            </b>
                        </div>
                    </div>

                    <hr/>



                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(function() {
                            $('#chart1').highcharts({
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Topic-wise Performance'
                                },
                                xAxis: {
                                    categories: [
'Simple Interest'                                    ]
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
                                series: [
{name: 'Total',data: [5]},{name: 'Answered',data: [5]},{name: 'Answered Correctly',data: [1]},{name: 'Answered Incorrectly',data: [4]},                                ]
                            });

//*************************************************************************************88


                            $('#chart2').highcharts({
                                chart: {
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
                                        data: [
[Simple Interest,100]                                        ]
                                    }]
                            });
                        });</script>


                    <div class="row"> 

                        <div class="col-lg-8" id="chart1">

                        </div>
                        <div class="col-lg-4" id="chart2">

                        </div>

                    </div>
