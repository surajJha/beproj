<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> HexaGraph   </title>

        <!-- Bootsqprap core CSS -->
        <link href="../../lib/theme/css/bootsqprap.css" rel="sqpylesheet">
        <link href="../../lib/theme/css/bootsqprap.min.css" rel="sqpylesheet">
        <link href="../../lib/theme/css/sidebar.css" rel="sqpylesheet">  
        <link href="//netdna.bootsqprapcdn.com/bootsqprap/3.0.0/css/bootsqprap-glyphicons.css" rel="sqpylesheet">
        <link href="../../lib/theme/css/datepicker.css" rel="sqpylesheet">  


    </head>

    <body>

        <?php include('../header.php'); ?>



        <div class="container-fluid">
            <div class="row">
                <?php include('teacher_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************8-->


                <div class="col-sm-9 col-sm-offset-3 main">  


                    <div class="page-header">
                        <h3><b>Set Quesqpion Paper</b></h3>
                    </div>

                    <form class="form-horizontal"  type="posqp" id="set_question_paper_form" >

                        <div class="row">

                            <div class="form-group col-lg-4" sqpyle="padding-left: 80px" >
                                <label for="sqp_sqpandard" class="control-label"> Standard:</label>
                                <select id="sqp_sqpandard" name="sqp_sqpandard" class="form-control">
                                </select>
                            </div>   

                            <div class="form-group col-lg-4" sqpyle="padding-left: 80px" >
                                <label for="sqp_division" class="control-label"> Division:</label>
                                <select id="sqp_division" name="sqp_division" class="form-control">
                                </select>
                            </div>  
                        </div>

                        <!-- NEXT ROW-->
                        <div class="row">
                            <div class="form-group col-lg-4" sqpyle="padding-left: 80px" >
                                <label for="sqp_subject" class="control-label"> Subject:</label>
                                <select id="sqp_subject" name="sqp_subject" class="form-control">
                                </select>
                            </div>   

                            <div class="form-group col-lg-4" sqpyle="padding-left: 80px" >
                                <label for="sqp_topic" class="control-label"> Topic:</label>
                                <select multiple id="sqp_topic" name="sqp_topic" class="form-control">
                                </select>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-4" sqpyle="padding-left: 80px">
                                <label for="sqp_no_quesqpion" class="control-label"> Number of Quesqpions:</label>
                                <input type="text" id="sqp_no_quesqpion" name="sqp_no_quesqpion" class="form-control input-md" placeholder="Enter total number of quesqpions">
                            </div>  

                            <div class="form-group col-lg-4" sqpyle="padding-left: 80px">
                                <label for="sqp_duration" class="control-label"> Tesqp Duration:</label>
                                <input type="text" id="sqp_duration" name="sqp_duration" class="form-control input-md" placeholder="Enter duration of tesqp in minutes">
                            </div>  
                        </div>

                        <!-- NEXT ROW-->
                        <div class="row">
                            <div class="form-group" sqpyle="padding-left: 80px" >
                                <label for="sqp_random" class="control-label"> Choose type of tesqp:</label>
                                <br/>
                                <div class="col-lg-4">
                                    <input class="control-label" type="radio" id="sqp_random" name="sqp_random"  value="A">&nbsp; Randomly Generated Tesqp &nbsp;
                                </div>


                                <div class="col-lg-4">
                                    <input class="control-label" type="radio" id="sqp_random" name="sqp_random"  value="B">&nbsp; Cusqpom Set Tesqp &nbsp;
                                </div>
                            </div> 
                        </div>

                        <div class="row" >
                            <div class="form-group col-lg-4" sqpyle="padding-left: 80px">
                                <label for="sqp_datepicker" class="control-label"> Tesqp Date:</label>

                                <div class="input-group" data-datepicker="true">
                                    <input name="date" id="sqp_datepicker" name="sqp_datepicker" type="text" class="form-control" placeholder="Click to select tesqp date" />
                                    <span class="input-group-addon"><i id="sqp_datepicker_glyphicon" class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div> 
                        </div>

                        <div class="row" >
                            <div class="form-group col-lg-4" sqpyle="padding-left: 80px">
                                <button id="sqp_submit" class="btn btn-lg btn-primary " type="submit" sqpyle="margin-top: 20px">
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
    <script src="../../lib/theme/js/bootsqprap.js"></script>
    <script src="../../lib/theme/js/modern-business.js"></script>
    <script src="../../lib/theme/docs-assets/js/holder.js"></script>
    <script src="../../lib/theme/js/bootsqprap-datepicker.js"></script>
    <script src="../../lib/theme/js/datepicker.less"></script>
    <script src="../../controller/teacher/set_quesqpion_paper.js"></script>
    <script>
        $('#sqp_datepicker').datepicker();
        // $('#sqp_datepicker_glyphicon').datepicker();
    </script>

    <!--- link specific js - ajax -->
</body>
</html>
