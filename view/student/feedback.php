<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script type="text/javascript" src="../../lib/theme/js/parsley.min.js"></script>
        <script type="text/javascript" src="../../lib/theme/js/parsley.js"></script>
        <title> HexaGraph   </title>

        <!-- Bootstrap core CSS -->
        <link href="../../lib/theme/css/bootstrap.css" rel="stylesheet">
        <link href="../../lib/theme/css/sidebar.css" rel="stylesheet">         
    </head>

    <body>

        <?php include('header.php'); ?>


        <div class="container-fluid">
            <div class="row">

                <?php include('student_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************8-->


                <div class="col-lg-9 col-lg-offset-2 main">             
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <center><h3>Feedback form</h3></center>
                        </div>

                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-3 col-lg-offset-2" id="div1">
                                    <label for="s1">Subject</label>
                                    <select required id="s1" name="s1" class="form-control">
                                        <!-- dynamically display options through AJAX -->
                                    </select>
                                </div>

                                <div class="col-lg-4" id="div2">
                                    <label for="s2">Teacher</label>
                                    <select  required id="s2" name="s2" class="form-control">
                                        <!-- dynamically display options through AJAX -->
                                    </select>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="row" id="exists" style="padding: 5%">

                                </div>
                                <div class="row" id="feedback" style="padding: 5%">

                                    <p>
                                        <b>Please answer the questions choosing from options varying from 1 to 5, where 1 indicates 'agree strongly' and 5 indicates 'disagree strongly'.</b>
                                    </p>
                                    <br>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <form id="feedback_form">
                                            <table class="table table-striped table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td>

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    Q 1. &nbsp; The semester course content, teaching method and evaluation system were provided at the start.
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-1 col-lg-offset-1">
                                                                    <input type="radio" name="1" value="1">&nbsp;1
                                                                </div>
                                                                <div class="col-lg-1 col-lg-offset-1">
                                                                    <input type="radio" name="1" value="2">&nbsp;2
                                                                </div>
                                                                <div class="col-lg-1 col-lg-offset-1">
                                                                    <input type="radio" name="1" value="3">&nbsp;3
                                                                </div>
                                                                <div class="col-lg-1 col-lg-offset-1">
                                                                    <input type="radio" name="1" value="4">&nbsp;4
                                                                </div>
                                                                <div class="col-lg-1 col-lg-offset-1">
                                                                    <input type="radio" name="1" value="5">&nbsp;5
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    Q 2. &nbsp; The course aims and objectives were clearly stated at the beginning of the period. 
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-1 col-lg-offset-1">
                                                                    <input type="radio" name="2" value="1">&nbsp;1
                                                                </div>
                                                                <div class="col-lg-1 col-lg-offset-1">
                                                                    <input type="radio" name="2" value="2">&nbsp;2
                                                                </div>
                                                                <div class="col-lg-1 col-lg-offset-1">
                                                                    <input type="radio" name="2" value="3">&nbsp;3
                                                                </div>
                                                                <div class="col-lg-1 col-lg-offset-1">
                                                                    <input type="radio" name="2" value="4">&nbsp;4
                                                                </div>
                                                                <div class="col-lg-1 col-lg-offset-1">
                                                                    <input type="radio" name="2" value="5">&nbsp;5
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr><br>

                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 3. &nbsp; The course was worth the amount of credit assigned to it. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="3" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="3" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="3" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="3" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="3" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 4. &nbsp; The course was taught according to the syllabus announced on the first day of class. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="4" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="4" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="4" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="4" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="4" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 5. &nbsp; The class discussions, homework assignments, applications and studies were satisfactory. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="5" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="5" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="5" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="5" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="5" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 6. &nbsp; The textbook and other courses resources were sufficient and up to date.	
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="6" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="6" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="6" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="6" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="6" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 7. &nbsp; The course allowed field work, applications, laboratory, discussion and other studies. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="7" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="7" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="7" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="7" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="7" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 8. &nbsp;  The quizzes, assignments, projects and exams contributed to helping the learning.	
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="8" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="8" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="8" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="8" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="8" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 9. &nbsp; I greatly enjoyed the class and was eager to actively participate during the lectures. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="9" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="9" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="9" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="9" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="9" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 10. &nbsp; My initial expectations about the course were met at the end of the period or year.
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="10" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="10" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="10" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="10" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="10" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 11. &nbsp; The course was relevant and beneficial to my professional development. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="11" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="11" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="11" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="11" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="11" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 12. &nbsp; The course helped me look at life and the world with a new perspective. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="12" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="12" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="12" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="12" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="12" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 13. &nbsp; The Instructor's knowledge was relevant and up to date. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="13" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="13" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="13" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="13" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="13" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 14. &nbsp; The Instructor came prepared for classes. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="14" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="14" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="14" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="14" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="14" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 15. &nbsp; The Instructor taught in accordance with the announced lesson plan. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="15" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="15" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="15" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="15" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="15" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 16. &nbsp; The Instructor was committed to the course and was understandable. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="16" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="16" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="16" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="16" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="16" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 17. &nbsp; The Instructor arrived on time for classes. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="17" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="17" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="17" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="17" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="17" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 18. &nbsp; The Instructor has a smooth and easy to follow delivery/speech. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="18" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="18" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="18" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="18" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="18" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 19. &nbsp; The Instructor made effective use of class hours. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="19" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="19" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="19" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="19" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="19" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 20. &nbsp; The Instructor explained the course and was eager to be helpful to students. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="20" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="20" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="20" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="20" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="20" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 21. &nbsp; The Instructor demonstrated a positive approach to students. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="21" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="21" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="21" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="21" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="21" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 22. &nbsp; The Instructor was open and respectful of the views of students about the course. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="22" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="22" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="22" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="22" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="22" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 23. &nbsp; The Instructor encouraged participation in the course. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="23" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="23" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="23" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="23" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="23" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 24. &nbsp; The Instructor gave relevant homework assignments/projects, and helped/guided students. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="24" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="24" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="24" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="24" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="24" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 25. &nbsp; The Instructor responded to questions about the course inside and outside of the course. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="25" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="25" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="25" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="25" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="25" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 26. &nbsp; The Instructor's evaluation system (midterm and final questions, projects, assignments, etc.) effectively measured the course objectives. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="26" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="26" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="26" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="26" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="26" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 27. &nbsp; The Instructor provided solutions to exams and discussed them with students. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="27" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="27" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="27" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="27" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="27" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                Q 28. &nbsp; The Instructor treated all students in a right and objective manner. 
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="28" value="1">&nbsp;1
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="28" value="2">&nbsp;2
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="28" value="3">&nbsp;3
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="28" value="4">&nbsp;4
                                                            </div>
                                                            <div class="col-lg-1 col-lg-offset-1">
                                                                <input type="radio" name="28" value="5">&nbsp;5
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>







                                                </tbody>
                                            </table>

                                            <center><button class="btn btn-primary btn-lg" type="submit" id="submit_button">Submit</button></center>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- include footer -->

        <!-- JavaScript -->


        <script src="../../lib/theme/js/modern-business.js"></script>
        <script src="../../lib/theme/docs-assets/js/holder.js"></script>

        <script src="../../controller/student/feedback.js"></script>
        <script>


        </script>
    </body>
</html>
