<html>

    <head>
        <link href="../lib/theme/css/bootstrap.css" rel="stylesheet">   
        <link href="../lib/theme/css/bootstrap-responsive.min.css" rel="stylesheet">  
       
    </head>   

    <body>

        <?php session_start(); ?>

        <!-- ***************** QUESTION FORM ELEMENTS CODE GOES HERE, this DIV to be sent viaa AJAX*****************************************************************-->
        <div class="container" id="view_question_form">

            <form role="form" action="../model/display_questions.php" method="post" class="form-horizontal" >
                <div class="row">

                    <div class="col-lg-2">
                        <label class="control-label" for="standard">Standard</label>
                        <select  id="standard" name="standard" class="form-control">
                            <!-- dynamically display options through AJAX -->
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <label class="control-label" for="subject">Subject</label>
                        <select  id="subject" name="subject" class="form-control">
                            <!-- dynamically display options through AJAX -->
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <label class="control-label" for="topic">Topic</label>
                        <select  id="topic" name="topic" class="form-control">
                            <!-- dynamically display options through AJAX -->
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <label class="control-label" for="type">Type</label>
                        <select  id="type" name="type" class="form-control">
                            <!-- dynamically display options through AJAX -->
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <label class="control-label" for="level">Level</label>
                        <select  id="level" name="level" class="form-control">
                            <!-- dynamically display options through AJAX -->
                        </select>
                    </div>

                    <div class="col-lg-2" style="padding-top: 27px">
                        <button id="go" type="submit" class="btn btn-primary">Go!</button>
                    </div>
                </div> 
            </form>
            <!--****************************************************************************************************-->

            <!-- ******* GRID ROW FOR ADD QUESTION BUTTON GROUP**********-->
            <div class="row" >
                <div class="col-lg-offset-2" style="padding-top: 20px">
                    <h3>Add a new question in the question bank</h3>
                    <!-- anchor buttons to activate specific modals *********** -->
                    <a href="#mcqModal" role="button" class="btn btn-lg btn-primary" data-toggle="modal"">MCQ</a>
                    <a href="#subjectiveModal" role="button" class="btn btn-lg btn-warning" data-toggle="modal" >Subjective</a>
                    <a href="#numericModal" role="button" class="btn btn-lg btn-danger" data-toggle="modal">Numeric</a>
                    <a href="#tfModal" role="button" class="btn btn-lg btn-success" data-toggle="modal">True/False</a>
                </div>
            </div>   

            <!-- ************** ALL MODAL CODE GOES HERE to be sent with AJAX to new PAGE***************************************-->

            <!-- ******* MCQ MODAL***********************************************************************************************-->
            <div class="modal fade  " id="mcqModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                           
                        <div class="modal-header">
                            <h4> Add an MCQ type question.</h4>
                        </div>
                        <form class="form-horizontal"  type="post" id="mcqModalForm" >
                            <div class="modal-body"> 
                              

                                <div class="form-group">
                                    <label for="standard" class="col-lg-4 control-label"> Standard:</label>
                                    <div class="col-lg-6">
                                        <select  id="standard" name="standard" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="col-lg-4 control-label"> Subject:</label>
                                    <div class="col-lg-6">
                                        <select  id="subject" name="subject" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="topic" class="col-lg-4 control-label"> Topic:</label>
                                    <div class="col-lg-6">
                                        <select  id="topic_mcqModal" name="topic" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type" class="col-lg-4 control-label"> Type:</label>
                                    <div class="col-lg-6">
                                        <select  id="type_mcqModal" name="type" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="level" class="col-lg-4 control-label"> Level:</label>
                                    <div class="col-lg-6">
                                        <select  id="level" name="level" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- text area -->
                                <div class="form-group">
                                    <label for="question_mcqModal" class="col-lg-4 control-label"> Question:</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" rows="6" cols="10" id="question_mcqModal" name="question_mcqModal"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="option1_mcqModal" class="col-lg-4 control-label"> Option 1:</label>
                                    <div class="col-lg-6">
                                        <input class="text" id="option1_mcqModal" name="option1_mcqModal" class="form-control" placeholder="Option 1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="option2_mcqModal" class="col-lg-4 control-label"> Option 2:</label>
                                    <div class="col-lg-6">
                                        <input class="text" id="option2_mcqModal" name="option2_mcqModal" class="form-control" placeholder="Option 1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="option3_mcqModal" class="col-lg-4 control-label"> Option 3:</label>
                                    <div class="col-lg-6">
                                        <input class="text" id="option3_mcqModal" name="option3_mcqModal" class="form-control" placeholder="Option 1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="option4_mcqModal" class="col-lg-4 control-label"> Option 4:</label>
                                    <div class="col-lg-6">
                                        <input class="text" id="option4_mcqModal" name="option4_mcqModal" class="form-control" placeholder="Option 1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="answer_mcqModal" class="col-lg-4 control-label"> Answer:</label>
                                    <div class="col-lg-6">
                                        <input class="text" id="answer_mcqModal" name="answer_mcqModal" class="form-control" placeholder="Option 1">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit"  id="submit_mcqModal" >SUBMIT</button>
                                    <a class="btn btn-danger" data-dismiss="modal">CLOSE</a>
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
                            <h4> Add a Subjective type question.</h4>
                        </div>
                        <form class="form-horizontal"  type="post" id="subjectiveModalForm" >
                            <div class="modal-body"> 
                              

                                <div class="form-group">
                                    <label for="standard" class="col-lg-4 control-label"> Standard:</label>
                                    <div class="col-lg-6">
                                        <select  id="standard" name="standard" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="col-lg-4 control-label"> Subject:</label>
                                    <div class="col-lg-6">
                                        <select  id="subject" name="subject" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="topic" class="col-lg-4 control-label"> Topic:</label>
                                    <div class="col-lg-6">
                                        <select  id="topic_mcqModal" name="topic" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type" class="col-lg-4 control-label"> Type:</label>
                                    <div class="col-lg-6">
                                        <select  id="type_mcqModal" name="type" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="level" class="col-lg-4 control-label"> Level:</label>
                                    <div class="col-lg-6">
                                        <select  id="level" name="level" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- text area -->
                                <div class="form-group">
                                    <label for="question_subjectModal" class="col-lg-4 control-label"> Question:</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" rows="6" cols="10" id="question_mcqModal" name="question_mcqModal"></textarea>
                                    </div>
                                </div>

                              <div class="form-group">
                                    <label for="keyword_subjectModal" class="col-lg-4 control-label"> Keywords:</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" rows="6" cols="10" id="keyword_mcqModal" name="keyword_mcqModal"></textarea>
                                    </div>
                                </div>

                             
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit"  id="submit_subjectiveModal" >SUBMIT</button>
                                    <a class="btn btn-danger" data-dismiss="modal">CLOSE</a>
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
                            <h4> Add a Numeric type question.</h4>
                        </div>
                        <form class="form-horizontal"  type="post" id="numericModalForm" >
                            <div class="modal-body"> 
                              

                                <div class="form-group">
                                    <label for="standard" class="col-lg-4 control-label"> Standard:</label>
                                    <div class="col-lg-6">
                                        <select  id="standard" name="standard" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="col-lg-4 control-label"> Subject:</label>
                                    <div class="col-lg-6">
                                        <select  id="subject" name="subject" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="topic" class="col-lg-4 control-label"> Topic:</label>
                                    <div class="col-lg-6">
                                        <select  id="topic_mcqModal" name="topic" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type" class="col-lg-4 control-label"> Type:</label>
                                    <div class="col-lg-6">
                                        <select  id="type_mcqModal" name="type" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="level" class="col-lg-4 control-label"> Level:</label>
                                    <div class="col-lg-6">
                                        <select  id="level" name="level" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- text area -->
                                <div class="form-group">
                                    <label for="question_numericModal" class="col-lg-4 control-label"> Question:</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" rows="6" cols="10" id="question_numericModal" name="question_numericModal"></textarea>
                                    </div>
                                </div>

                               
                                <div class="form-group">
                                    <label for="answer_numericModal" class="col-lg-4 control-label"> Answer:</label>
                                    <div class="col-lg-6">
                                        <input class="text" id="answer_numericModal" name="answer_numericModal" class="form-control" placeholder="Option 1">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit"  id="submit_numericModal" >SUBMIT</button>
                                    <a class="btn btn-danger" data-dismiss="modal">CLOSE</a>
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
                            <h4> Add a True/False type question.</h4>
                        </div>
                        <form class="form-horizontal"  type="post" id="tfModalForm" >
                            <div class="modal-body"> 
                              

                                <div class="form-group">
                                    <label for="standard" class="col-lg-4 control-label"> Standard:</label>
                                    <div class="col-lg-6">
                                        <select  id="standard" name="standard" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="col-lg-4 control-label"> Subject:</label>
                                    <div class="col-lg-6">
                                        <select  id="subject" name="subject" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="topic" class="col-lg-4 control-label"> Topic:</label>
                                    <div class="col-lg-6">
                                        <select  id="topic_mcqModal" name="topic" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type" class="col-lg-4 control-label"> Type:</label>
                                    <div class="col-lg-6">
                                        <select  id="type_mcqModal" name="type" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="level" class="col-lg-4 control-label"> Level:</label>
                                    <div class="col-lg-6">
                                        <select  id="level" name="level" class="form-control">
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </div>
                                
                                 <!-- text area -->
                                <div class="form-group">
                                    <label for="question_tfModal" class="col-lg-4 control-label"> Question:</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" rows="6" cols="10" id="question_tfModal" name="question_tfModal"></textarea>
                                    </div>
                                </div>
                                
                                <!--******* ANSWER***********-->

                                  <div class="form-group">
                                    <label for="level" class="col-lg-4 control-label"> Answer:</label>
                                    <div class="col-lg-6">
                                        <select  id="level" name="level" class="form-control">
                                            <option>True</option>
                                            <option>False</option>
                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit"  id="submit_tfModal" >SUBMIT</button>
                                    <a class="btn btn-danger" data-dismiss="modal">CLOSE</a>
                                </div>

                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!--*****************************-->

        </div>   <!--*********END OF DIV TO BE SENT VIA AJAX*****************************************************-->





        <script src="../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../lib/theme/js/bootstrap.js"></script>
        <script src="../lib/theme/js/modern-business.js"></script>
        <script src="../lib/theme/docs-assets/js/holder.js"></script>




        
        
    </body>

</html>
