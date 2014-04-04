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



    </head>

    <body>
        <?php session_start(); ?>

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
                            <b>Test id : </b> <?php echo $_SESSION['test_id'] . "<br/>"; ?>
                            <b>Subject : </b> <?php echo $_SESSION['test']['subject_name'] . "<br/>"; ?>
                            <b>Class : </b> <?php echo $_SESSION['test']['standard'] . " - " . $_SESSION['test']['division'] . "<br/>"; ?>
                        </div> 

                        <div class="col-lg-offset-1 col-lg-5">
                            <b>Date : </b> <?php echo $_SESSION['test']['date'] . "<br/>"; ?>
                            <b>Duration : </b> <?php echo $_SESSION['test']['duration'] . " minutes" . "<br/>"; ?>
                        </div>
                    </div>



                    <div class="row" style="color: green">
                        <div class="col-lg-offset-1 col-lg-5">
                            <b>
                                Marks Obtained : <?php echo $_SESSION['test']['m']; ?> 
                            </b>
                        </div>

                        <div class="col-lg-offset-1 col-lg-5">
                            <b>
                                Total Marks : <?php echo $_SESSION['test']['no_questions']; ?>
                            </b>
                        </div>
                    </div>

                    <hr/>



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
<?php
$list = array();

$topics = array();

for ($i = 0; $i < sizeof($_SESSION['test']['questions']); $i++)
{
    $x = $_SESSION['test']['questions'][$i]['topic_name'];
    if (!in_array($x, $list))
    {
        array_push($list, $x);
        $topics["{$x}"] = array("t" => 0, "a" => 0, "c" => 0);
    }

    //for total
    $topics["{$x}"]['t'] = $topics["{$x}"]['t'] + 1;

    //for answered
    if ($_SESSION['test']['questions'][$i]['response'] !== "-")
    {
        $topics["{$x}"]['a'] = $topics["{$x}"]['a'] + 1;
    }

    if ($_SESSION['test']['questions'][$i]['response'] == $_SESSION['test']['questions'][$i]['answer'])
    {
        $topics["{$x}"]['c'] = $topics["{$x}"]['c'] + 1;
    }
}

for ($i = 0; $i < sizeof($list) - 1; $i++)
{
    echo "'" . $list[$i] . "',";
}
echo "'" . $list[sizeof($list) - 1] . "'";
?>
                                    ]
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
<?php
echo "{";
echo "name: 'Total',";
echo "data: [";

$total=0;

for ($i = 0; $i < sizeof($topics); $i++)
{
    $total+=$topics[$list[$i]]['t'];
    echo $topics[$list[$i]]['t'];
    if ($i < sizeof($topics) - 1)
        echo ",";
}

echo "]},";

echo "{";
echo "name: 'Answered',";
echo "data: [";

for ($i = 0; $i < sizeof($topics); $i++)
{
    echo $topics[$list[$i]]['a'];
    if ($i < sizeof($topics) - 1)
        echo ",";
}

echo "]},";

echo "{";
echo "name: 'Answered Correctly',";
echo "data: [";

for ($i = 0; $i < sizeof($topics); $i++)
{
    echo $topics[$list[$i]]['c'];
    if ($i < sizeof($topics) - 1)
        echo ",";
}

echo "]},";

echo "{";
echo "name: 'Answered Incorrectly',";
echo "data: [";

for ($i = 0; $i < sizeof($topics); $i++)
{
    echo $topics[$list[$i]]['a'] - $topics[$list[$i]]['c'];
    if ($i < sizeof($topics) - 1)
        echo ",";
}

echo "]},";
?>
                                ]
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
<?php

for ($i = 0; $i < sizeof($topics); $i++)
{
    echo "['".$list[$i]."',".($topics[$list[$i]]['t']/$total*100)."]";
    if($i < sizeof($topics)-1)
        echo",";
}
?>
                                        ]
                                    }]
                            });
                        });</script>


                    <div class="row"> 

                        <div class="col-lg-8" id="chart1">

                        </div>
                        <div class="col-lg-4" id="chart2">

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
                                        $r.="<td><details><summary>" . $_SESSION['test']['questions'][$i]['question_desc'] . "</summary>";
                                        if ($_SESSION['test']['questions'][$i]['type'] == "Mcq")
                                        {
                                            $r.="<p><b> A: </b> " . $_SESSION['test']['questions'][$i]['optionA'] . "&nbsp;&nbsp;&nbsp; <b>B:</b> " . $_SESSION['test']['questions'][$i]['optionB'] . " &nbsp; &nbsp; &nbsp; <b> C: </b> " . $_SESSION['test']['questions'][$i]['optionC'] . "&nbsp;&nbsp;&nbsp; <b>D:</b> " . $_SESSION['test']['questions'][$i]['optionD'] . " </p>";
                                        }
                                        $r.= "</details></td>";
                                        $r.="<td>" . $_SESSION['test']['questions'][$i]['response'] . "</td>";
                                        $r.="<td>" . $_SESSION['test']['questions'][$i]['answer'] . "</td>";
                                        $r.="</tr>";
                                        echo $r;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <hr/>
                    </div>
                </div>  
            </div>
        </div>

        <!-- **************************************************** -->

        <!-- * destroying session variables related to that test * -->

        <?php
        /*
          if (isset($_SESSION['test_id']))
          unset($_SESSION['test_id']);
          if (isset($_SESSION['test']))
          unset($_SESSION['test']);
         * 
         */
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
