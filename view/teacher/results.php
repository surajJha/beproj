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
        <link href="../../lib/theme/css/sidebar.css" rel="stylesheet">         
        <link rel="stylesheet" href="../../lib/theme/css/design.css" type="text/css" />
        <script type="text/javascript" src="../../lib/theme/js/drop.js"></script>
    </head>

    <body>

        <?php include('header.php'); ?>

        <div class="container-fluid">
            <div class="row">
                <?php include('teacher_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************8-->

                <div class="col-sm-10 col-sm-offset-2 main">             

                    <div class="container">

                        <h4>Select the parameters to view Results!</h4><br>

                        <form  id="view_results" method="post" class="form-horizontal" >

                            <div class="row">
                                <div class="col-lg-3">
                                    <select required id="s1" name="s1" class="form-control">
                                        <option>Select Criteria</option>
                                        <option>Test Performance Summary</option>
                                        <option>Student Performance Summary</option>
                                        <option>Subject Performance Summary</option>
                                        <option>Class Performance Summary</option>
                                    </select>
                                </div>

                                <div class="col-lg-2">
                                    <select  required id="s2" name="s2" class="form-control">
                                        <!-- dynamically display options through AJAX -->
                                    </select>
                                </div>

                                <div class="col-lg-2" id="s3"></div>

                                <div class="col-lg-2" id="s4"></div>

                            </div> 
                        </form>
                        <hr/>
                    </div>



                    <!--to load the contents through ajax -->
                    <div class="col-lg-11" id ="myContent"></div>


                </div>
            </div>
        </div>
        <!-- ********************************************************************-->

        <!-- include footer -->

        <!-- JavaScript -->

        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>
        <script src="../../lib/theme/docs-assets/js/holder.js"></script>

        
        <script src="../../lib/theme/js/highcharts-all.js"></script>
        <script src="../../lib/theme/js/highcharts-more.js"></script>
        <script src="../../lib/theme/js/highcharts.js"></script>
        <script src="../../controller/teacher/results.js"></script>

    </body>
</html>

