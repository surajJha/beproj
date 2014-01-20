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

        <?php include('../header.php'); ?>

        <div class="container-fluid">
            <div class="row">
                <?php include('teacher_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************8-->

                <div class="col-sm-9 col-sm-offset-2 main">             

                    <div class="container" id="view_add_question">
                        <h4>Select the parameters to view Question Bank!</h4>
                        <form  id="view_questions" method="post" class="form-horizontal" >

                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="control-label" for="vq_standard">Standard</label>
                                    <select required id="vq_standard" name="vq_standard" class="form-control">
                                        <!-- dynamically display options through AJAX -->
                                    </select>
                                </div>

                                <div class="col-lg-2">
                                    <label class="control-label" for="vq_subject">Subject</label>
                                    <select  id="vq_subject" name="vq_subject" class="form-control">
                                        <!-- dynamically display options through AJAX -->
                                    </select>
                                </div>

                                <div class="col-lg-2">
                                    <label class="control-label" for="vq_topic">Topic</label>
                                    <select  id="vq_topic" name="vq_topic" class="form-control">
                                        <!-- dynamically display options through AJAX -->
                                    </select>
                                </div>

                                <div class="col-lg-2">
                                    <label class="control-label" for="vq_type">Type</label>
                                    <select  id="vq_type" name="vq_type" class="form-control">
                                        <!-- dynamically display options through AJAX -->
                                    </select>
                                </div>

                                <div class="col-lg-2">
                                    <label class="control-label" for="vq_level">Level</label>
                                    <select  id="vq_level" name="vq_level" class="form-control">
                                        <!-- dynamically display options through AJAX -->
                                    </select>
                                </div>

                                <div class="col-lg-2" style="padding-top: 27px">
                                    <button id="vq_go_button" type="submit" class="btn btn-primary">Go!</button>
                                </div>
                            </div> 
                        </form>

                        <!--****************************************************************************************************-->

                        <hr/>

                        <!-- ******* GRID ROW FOR ADD QUESTION BUTTON GROUP**********-->

                        <div class="row col-lg-offset-4" >
                            <div  style="padding-top: 20px">

                                <dl class="dropdown mydrop">
                                    <dt id="one-ddheader" onmouseover="ddMenu('one', 1)" onmouseout="ddMenu('one', -1)">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add New Question</dt>
                                    <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one', -1)">
                                        <ul>
                                            <li><a href="#mcqModal" class="separator" data-toggle="modal">MCQ</a></li>
                                            <li><a href="#subjectiveModal" class="separator" data-toggle="modal">Subjective</a></li>
                                            <li><a href="#numericModal" class="separator" data-toggle="modal">Numeric</a></li>
                                            <li><a href="#tfModal" class="separator" data-toggle="modal">True False</a></li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>   

                            <div class="row">
                                <div class="alert-success" id="success_message">
                                </div>
                                <div class="alert-warning" id="error_message">
                                </div>
                            </div>

                            <!-- ************** ALL MODAL CODE GOES HERE to be sent with AJAX to new PAGE***************************************-->

                            <!-- ******* MCQ MODAL***********************************************************************************************-->
                            <div class="modal fade  " id="mcqModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 align="center">Add a Multiple Choice Question!</h4>
                                        </div>
                                        <form  class="form-horizontal"  method="post" id="mcqModalForm" >
                                            <div class="modal-body"> 

                                                <div class="form-group">
                                                    <label for="mcq_standard" class="col-lg-4 control-label"> Standard:</label>
                                                    <div class="col-lg-6">
                                                        <select id="mcq_standard" name="mcq_standard" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mcq_subject" class="col-lg-4 control-label"> Subject:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="mcq_subject" name="mcq_subject" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mcq_topic" class="col-lg-4 control-label"> Topic:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="mcq_topic" name="mcq_topic" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mcq_level" class="col-lg-4 control-label"> Level:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="mcq_level" name="mcq_level" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- text area -->
                                                <div class="form-group">
                                                    <label for="mcq_question" class="col-lg-4 control-label"> Question:</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" rows="6" cols="10" id="mcq_question" name="mcq_question" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mcq_op_a" class="col-lg-4 control-label">A:</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="mcq_op_a" name="mcq_op_a" class="form-control" placeholder="Option A" required />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mcq_op_b" class="col-lg-4 control-label">B:</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="mcq_op_b" name="mcq_op_b" class="form-control" placeholder="Option B" required />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mcq_op_c" class="col-lg-4 control-label">C:</label>
                                                    <div class="col-lg-6">
                                                        <input class="text" id="mcq_op_c" name="mcq_op_c" class="form-control" placeholder="Option C" required />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mcq_op_d" class="col-lg-4 control-label">D:</label>
                                                    <div class="col-lg-6">
                                                        <input class="text" id="mcq_op_d" name="mcq_op_d" class="form-control" placeholder="Option D" required />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mcq_answer" class="col-lg-4 control-label"> Answer:</label>
                                                    <div class="col-lg-6">
                                                        <input type="radio" id="mcq_answer" name="mcq_answer"  value="A">A &nbsp;
                                                        <input type="radio" id="mcq_answer" name="mcq_answer"  value="B">B &nbsp;
                                                        <input type="radio" id="mcq_answer" name="mcq_answer"  value="C">C &nbsp;
                                                        <input type="radio" id="mcq_answer" name="mcq_answer"  value="D">D &nbsp;
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit"  id="submit_mcqModal" >Submit</button>
                                                    <a class="btn btn-danger" id="mcq_close" data-dismiss="modal">Close</a>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>




                            <!-- ******* SUBJECTIVE MODAL*******************************************************-->
                            <div class="modal fade  " id="subjectiveModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 align="center">Add a Subjective Question!</h4>
                                        </div>
                                        <form class="form-horizontal"  method="post" id="subjectiveModalForm" >
                                            <div class="modal-body"> 


                                                <div class="form-group">
                                                    <label for="sub_standard" class="col-lg-4 control-label"> Standard:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="sub_standard" name="sub_standard" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sub_subject" class="col-lg-4 control-label"> Subject:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="sub_subject" name="sub_subject" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sub_topic" class="col-lg-4 control-label"> Topic:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="sub_topic" name="sub_topic" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="sub_level" class="col-lg-4 control-label"> Level:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="sub_level" name="sub_level" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- text area -->
                                                <div class="form-group">
                                                    <label for="sub_question" class="col-lg-4 control-label"> Question:</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" rows="6" cols="10" id="sub_question" name="sub_question" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sub_keyword" class="col-lg-4 control-label"> Keywords:</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" rows="6" cols="10" id="sub_keyword" name="sub_keyword" required></textarea>
                                                    </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit"  id="submit_subjectiveModal" >Submit</button>
                                                    <a class="btn btn-danger" id="subjective_close" data-dismiss="modal">Close</a>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>



                            <!--*****************************-->


                            <!-- ******* NUMERIC MODAL**********************************************************-->
                            <div class="modal fade  " id="numericModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 align="center">Add a Numeric Question!</h4>
                                        </div>
                                        <form class="form-horizontal"  method="post" id="numericModalForm" >
                                            <div class="modal-body"> 


                                                <div class="form-group">
                                                    <label for="num_standard" class="col-lg-4 control-label"> Standard:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="num_standard" name="num_standard" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="num_subject" class="col-lg-4 control-label"> Subject:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="num_subject" name="num_subject" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="num_topic" class="col-lg-4 control-label"> Topic:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="num_topic" name="num_topic" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="num_level" class="col-lg-4 control-label"> Level:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="num_level" name="num_level" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- text area -->
                                                <div class="form-group">
                                                    <label for="num_question" class="col-lg-4 control-label"> Question:</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" rows="6" cols="10" id="num_question" name="num_question" required></textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="num_answer" class="col-lg-4 control-label"> Answer:</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" id="num_answer" name="num_answer" class="form-control" placeholder="Answer" required>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit"  id="submit_numericModal" >Submit</button>
                                                    <a class="btn btn-danger" id="numeric_close"  data-dismiss="modal">Close</a>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>


                            <!--**********************************************************************************-->

                            <!-- *******true false MODAL****************************************************************-->
                            <div class="modal fade  " id="tfModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 align="center">Add a True or False Question!</h4>
                                        </div>
                                        <form class="form-horizontal" id="tfModalForm" >
                                            <div class="modal-body"> 


                                                <div class="form-group">
                                                    <label for="tf_standard" class="col-lg-4 control-label"> Standard:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="tf_standard" name="tf_standard" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tf_subject" class="col-lg-4 control-label"> Subject:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="tf_subject" name="tf_subject" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tf_topic" class="col-lg-4 control-label"> Topic:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="tf_topic" name="tf_topic" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tf_level" class="col-lg-4 control-label"> Level:</label>
                                                    <div class="col-lg-6">
                                                        <select  id="tf_level" name="tf_level" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- text area -->
                                                <div class="form-group">
                                                    <label for="tf_question" class="col-lg-4 control-label"> Question:</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" rows="6" cols="10" id="tf_question" name="tf_question" required></textarea>
                                                    </div>
                                                </div>

                                                <!--******* ANSWER***********-->

                                                <div class="form-group">
                                                    <label for="tf_answer" class="col-lg-4 control-label"> Answer:</label>
                                                    <div class="col-lg-6">
                                                        <input type="radio" id="tf_answer" name="tf_answer"  value="TRUE">True &nbsp;
                                                        <input type="radio" id="tf_answer" name="tf_answer"  value="FALSE">False &nbsp;
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit"  id="submit_tfModal" >Submit</button>
                                                    <a class="btn btn-danger" id="tf_close" data-dismiss="modal">Close</a>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!--*****************************-->



                        </div>
                        <!--to load the contents through ajax -->
                        <div id ="myContent">

                        </div>
                    </div>

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
        <!-- DO NOT MOVE THIS SCRIPT BELOW TEACHERUPDATE.JS LINK. IT WILL NOT WORK -->

        <script src="../../controller/teacher/teacherupdate.js"></script>

    </body>
</html>
 
