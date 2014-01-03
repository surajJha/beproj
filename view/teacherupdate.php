<html>

    <head>
        <link href="../lib/theme/css/bootstrap.css" rel="stylesheet">   
        <link href="../lib/theme/css/bootstrap-responsive.min.css" rel="stylesheet">  
    </head>   

    <body>
        
        <?php session_start(); ?>
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
       
         <!-- ******* GRID ROW FOR ADD QUESTION BUTTON GROUP**********-->
         <div class="row" >
             <div class="col-lg-offset-2" style="padding-top: 20px">
                 <h3>Add a new question in the question bank</h3>
                 
                         <button type="button" class="btn btn-danger btn-lg s">MCQ</button> 
                         <button type="button" class="btn btn-primary btn-lg">Subjective</button> 
                         <button type="button" class="btn  btn-warning btn-lg">Numeric</button> 
                         <button type="button" class="btn btn-success btn-lg">True/False</button> 
                    
                   </div>
                  </div>       
          </div>       

        <script src="../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../lib/theme/js/bootstrap.js"></script>
        <script src="../lib/theme/js/modern-business.js"></script>
        <script src="../lib/theme/docs-assets/js/holder.js"></script>
        
       

    </body>

</html>