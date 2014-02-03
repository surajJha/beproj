<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> HexaGraph   </title>


        <!-- Bootstrap core CSS -->
        <link href="../../lib/theme/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="../../lib/theme/css/modern-business.css" rel="stylesheet">
        <link href="../../lib/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        
        <script type="text/javascript">
function speed(){
    $("#speed_button").click(function(){
      $('#speedometer').highcharts({
	
	    chart: {
	        type: 'gauge',
	        plotBackgroundColor: null,
	        plotBackgroundImage: null,
	        plotBorderWidth: 0,
	        plotShadow: false
	    },
	    
	    title: {
	        text: 'Test Performance'
	    },
	    
	    pane: {
	        startAngle: -150,
	        endAngle: 150,
	        background: [{
	            backgroundColor: {
	                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
	                stops: [
	                    [0, '#FFF'],
	                    [1, '#333']
	                ]
	            },
	            borderWidth: 0,
	            outerRadius: '109%'
	        }, {
	            backgroundColor: {
	                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
	                stops: [
	                    [0, '#333'],
	                    [1, '#FFF']
	                ]
	            },
	            borderWidth: 1,
	            outerRadius: '107%'
	        }, {
	            // default background
	        }, {
	            backgroundColor: '#DDD',
	            borderWidth: 0,
	            outerRadius: '105%',
	            innerRadius: '103%'
	        }]
	    },
	       
	    // the value axis
	    yAxis: {
	        min: 0,
	        max: 200,
	        
	        minorTickInterval: 'auto',
	        minorTickWidth: 1,
	        minorTickLength: 10,
	        minorTickPosition: 'inside',
	        minorTickColor: '#666',
	
	        tickPixelInterval: 30,
	        tickWidth: 2,
	        tickPosition: 'inside',
	        tickLength: 10,
	        tickColor: '#666',
	        labels: {
	            step: 2,
	            rotation: 'auto'
	        },
	        title: {
	            text: 'km/h'
	        },
	        plotBands: [{
	            from: 0,
	            to: 120,
	            color: '#55BF3B' // green
	        }, {
	            from: 120,
	            to: 160,
	            color: '#DDDF0D' // yellow
	        }, {
	            from: 160,
	            to: 200,
	            color: '#DF5353' // red
	        }]        
	    },
	
	    series: [{
	        name: 'Speed',
	        data: [80],
	        tooltip: {
	            valueSuffix: ' Reponse'
	        }
	    }]
	
	}, 
	// Add some life
	function (chart) {
		if (!chart.renderer.forExport) {
		    setInterval(function () {
		        var point = chart.series[0].points[0],
		            newVal,
		            inc = Math.round((Math.random() - 0.5) * 20);
		        
		        newVal = point.y + inc;
		        if (newVal < 0 || newVal > 200) {
		            newVal = point.y - inc;
		        }
		        
		        point.update(newVal);
		        
		    }, 3000);
		}
	});
});	
}

    

</script>
    </head>

    <body onload="speed()">

        <?php session_start(); ?>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class =" container">
                <a href="#" class =" navbar-brand">HexaGraph</a>
            </div>
        </div>

        <!-- PAGE TITLE GOES HERE ************************************ -->
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-1 col-lg-10"> 

                    <div style="padding: 5%">

                        <div class="row">
                            <center>
                                <h3>Test Result</h3>
                            </center>
                        </div>

                        <hr/>

                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-4">
                                <b>Test id : </b> <?php echo $_SESSION['test_id'] . "<br/>"; ?>
                                <b>Subject : </b> <?php echo $_SESSION['test']['subject_name'] . "<br/>"; ?>
                                <b>Class : </b> <?php echo $_SESSION['test']['standard'] . " - " . $_SESSION['test']['division'] . "<br/>"; ?>
                            </div> 

                            <div class="col-lg-offset-1 col-lg-4">
                                <b>Date : </b> <?php echo $_SESSION['test']['date'] . "<br/>"; ?>
                                <b>Duration : </b> <?php echo $_SESSION['test']['duration'] . " minutes" . "<br/>"; ?>
                            </div>
                        </div>



                        <div class="row" style="color: green">
                            <div class="col-lg-offset-1 col-lg-4">
                                <b>
                                    Marks Obtained : <?php echo $_SESSION['test']['m']; ?> 
                                </b>
                            </div>

                            <div class="col-lg-offset-1 col-lg-4">
                                <b>
                                    Total Marks : <?php echo $_SESSION['test']['no_questions']; ?>
                                </b>
                            </div>
                        </div>

                        <hr/>

                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped">

                                    <thead>
                                        <tr> 
                                            <th>Question No.</th> <th>Description</th> <th>Your Answer</th> <th>Correct Answer</th> 
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < sizeof($_SESSION['test']['questions']); $i++)
                                        {
                                            $r = "<tr>";
                                            $r.="<td>" . ($i + 1) . "</td>";
                                            $r.="<td>" . $_SESSION['test']['questions'][$i]['question_desc'] . "</td>";
                                            $r.="<td>" . $_SESSION['test']['questions'][$i]['response'] . "</td>";
                                            $r.="<td>" . $_SESSION['test']['questions'][$i]['answer'] . "</td>";
                                            $r.="</tr>";
                                            echo $r;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr/>
                      <!---------------SPEEDOMETER--------------------->
                      <center>  <input class="btn btn-lg btn-primary"value="Visualize" id="speed_button" /></center>
                        <div class="row">
                            <div class="col-lg-6" style="padding-left: 100px">
                                <div id="speedometer">
                                    
                                    <!-- SPEEDOMETER WILL BE DISPLAYED IN THIS DIV -->
                                    
                                    
                                    
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>  

            </div>
        </div>

        <!-- **************************************************** -->

        <!-- * destroying session variables related to that test * -->

        <?php
        if (isset($_SESSION['test_id']))
            unset($_SESSION['test_id']);
        if (isset($_SESSION['test']))
            unset($_SESSION['test']);
        ?>
        <!-- ******************************************************** -->

        <!-- JavaScript -->
        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>
        <script src="../../lib/theme/js/charts/highcharts.js"></script>
        <script src="../../lib/theme/js/charts/highcharts-more.js"></script>
        <script src="../../lib/theme/js/charts/exporting.js"></script>
        

    </body>
</html>