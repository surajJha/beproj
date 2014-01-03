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
                        <label class="control-label" for="class2">Class</label>
                        <select  id="class2" name="class2" class="form-control">
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
              <!--*******************************************************************-->
       
              
              
              
         <!-- ******* GRID ROW FOR ADD QUESTION BUTTON GROUP**********-->
         <div class="row" >
             <div class="col-lg-offset-2" style="padding-top: 20px">
                 <h3>Add a new question in the question bank</h3>
                 <!-- anchor buttons to activate specific modals *********** -->
                 <a href="#mcqModal" role="button" class="btn btn-lg btn-primary" data-toggle="modal">MCQ</a>
                 <a href="#subjectiveModal" role="button" class="btn btn-lg btn-warning" data-toggle="modal" >Subjective</a>
                 <a href="#numericModal" role="button" class="btn btn-lg btn-danger" data-toggle="modal">Numeric</a>
                 <a href="#tfModal" role="button" class="btn btn-lg btn-success" data-toggle="modal">True/False</a>
             </div>
         </div>   
           
        <!-- ************** ALL MODAL CODE GOES HERE to be sent with AJAX to new PAGE***************************************-->
       
         <!-- ******* MCQ MODAL********-->
        <div class="modal fade" id="mcqModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal">
                    <div class="modal-header">
                        <h4> Add an MCQ type question.</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="class_mcqModal" class="col-lg-4 control-label"> Class:</label>
                            <div class="col-lg-6">
                                 <select  id="class_mcqModal" name="class_mcqModal" class="form-control">
                                         <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                  </select>
                            </div>
                            
                        </div>
                        
                         <div class="form-group">
                            <label for="subject_mcqModal" class="col-lg-4 control-label"> Subject:</label>
                            <div class="col-lg-6">
                                 <select  id="subject_mcqModal" name="subject_mcqModal" class="form-control">
                                         <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                  </select>
                            </div>
                            
                        </div>
                        
                           <div class="form-group">
                            <label for="topic_mcqModal" class="col-lg-4 control-label"> Topic:</label>
                            <div class="col-lg-6">
                                 <select  id="topic_mcqModal" name="topic_mcqModal" class="form-control">
                                         <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                  </select>
                            </div>
                            
                        </div>
                        
                           <div class="form-group">
                            <label for="type_mcqModal" class="col-lg-4 control-label"> Type:</label>
                            <div class="col-lg-6">
                                 <select  id="type_mcqModal" name="type_mcqModal" class="form-control">
                                         <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                  </select>
                            </div>
                            
                        </div>
                        
                           <div class="form-group">
                            <label for="level_mcqModal" class="col-lg-4 control-label"> Level:</label>
                            <div class="col-lg-6">
                                 <select  id="level_mcqModal" name="level_mcqModal" class="form-control">
                                         <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                  </select>
                            </div>
                            
                        </div>
                        
                        
                            
                        
                    </div>
                        
                        
                        
                        
                   </form>     
                </div>
            </div>
            
        </div>
        <!--*****************************-->
        
        <!-- ******* SUBJECTIVE MODAL********-->
        <div class="modal fade" id="subjectiveModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4> Add a Subjective type question.</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                        
                </div>
            </div>
            
        </div>
        <!--*****************************-->
        
        <!-- ******* NUMERIC MODAL********-->
        <div class="modal fade" id="numericModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4> Add a Numeric type question.</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                        
                </div>
            </div>
            
        </div>
        <!--*****************************-->
        
        <!-- *******true false MODAL********-->
        <div class="modal fade" id="tfModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4> Add an TRUE/FALSE type question.</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                        
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