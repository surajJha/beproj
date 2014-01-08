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
        <link href="../../lib/theme/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../lib/theme/css/sidebar.css" rel="stylesheet">  
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link href="../../lib/theme/css/datepicker.css" rel="stylesheet">  


    </head>

    <body>

        <?php include('../header.php'); ?>



        <div class="container-fluid">
            <div class="row">
                <?php include('teacher_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************8-->


                <div class="col-sm-9 col-sm-offset-3 main">  


                    <div class="page-header">
                        <h3><b>Set Question Paper</b></h3>
                    </div>

                    <form class="form-horizontal"  type="post" id="rt" >

                        <div class="row">

                            <div class="form-group col-lg-4" style="padding-left: 80px" >
                                <label for="set_test_standard" class="control-label"> Standard:</label>
                                <select id="set_test_standard" name="set_test_standard" class="form-control">
                                </select>
                            </div>   

                            <div class="form-group col-lg-4" style="padding-left: 80px" >
                                <label for="set_test_division" class="control-label"> Division:</label>
                                <select id="set_test_division" name="set_test_division" class="form-control">
                                </select>
                            </div>  
                        </div>

                        <!-- NEXT ROW-->
                        <div class="row">
                            <div class="form-group col-lg-4" style="padding-left: 80px" >
                                <label for="set_test_subject" class="control-label"> Subject:</label>
                                <select id="set_test_subject" name="set_test_subject" class="form-control">
                                </select>
                            </div>   

                            <div class="form-group col-lg-4" style="padding-left: 80px" >
                                <label for="set_test_topic" class="control-label"> Topic:</label>
                                <select multiple id="set_test_topic" name="set_test_topic" class="form-control">
                                </select>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-4" style="padding-left: 80px">
                                <label for="set_test_no_question" class="control-label"> Number of Questions:</label>
                                <input type="text" id="set_test_no_question" name="set_test_no_question" class="form-control input-md" placeholder="Enter total number of questions">
                            </div>  

                            <div class="form-group col-lg-4" style="padding-left: 80px">
                                <label for="set_test_duration" class="control-label"> Test Duration:</label>
                                <input type="text" id="set_test_duration" name="set_test_duration" class="form-control input-md" placeholder="Enter duration of test in minutes">
                            </div>  
                        </div>

                        <!-- NEXT ROW-->
                        <div class="row">
                            <div class="form-group" style="padding-left: 80px" >
                                <label for="set_test_random" class="control-label"> Choose type of test:</label>
                                <br/>
                                <div class="col-lg-4">
                                    <input class="control-label" type="radio" id="set_test_random" name="set_test_random"  value="A">&nbsp; Randomly Generated Test &nbsp;
                                </div>


                                <div class="col-lg-4">
                                    <input class="control-label" type="radio" id="set_test_random" name="set_test_random"  value="B">&nbsp; Custom Set Test &nbsp;
                                </div>
                            </div> 
                        </div>

                        <div class="row" >
                            <div class="form-group col-lg-4" style="padding-left: 80px">
                                <label for="set_test_datepicker" class="control-label"> Test Date:</label>

                                <div class="input-group" data-datepicker="true">
                                    <input name="date" id="set_test_datepicker" name="set_test_datepicker" type="text" class="form-control" placeholder="Click to select test date" />
                                    <span class="input-group-addon"><i id="set_test_datepicker_glyphicon" class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div> 
                        </div>

                        <div class="row" >
                            <div class="form-group col-lg-4" style="padding-left: 80px">
                                <button id="set_test_submit" class="btn btn-lg btn-primary " type="submit" style="margin-top: 20px">
                                    Submit
                                </button>
                            </div>    
                        </div>

                    </form>
                </div>
                <!--*************************************************************************-->

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
    <script src="../../lib/theme/js/bootstrap-datepicker.js"></script>
    <script src="../../lib/theme/js/datepicker.less"></script>
    <script src="../../controller/teacher/set_question_paper.js"></script>
    <script>
        $('#set_test_datepicker').datepicker();
        // $('#set_test_datepicker_glyphicon').datepicker();
    </script>

    <!--- link specific js - ajax -->
</body>
</html>
