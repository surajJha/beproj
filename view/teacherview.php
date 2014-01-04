<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> HexaGraph   </title>

        <!-- Bootstrap core CSS -->
        <link href="../lib/theme/css/bootstrap.css" rel="stylesheet">
        <link href="../lib/theme/css/sidebar.css" rel="stylesheet">         
    </head>

    <body>

        <?php include('header.php'); ?>


        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 sidebar">
                    <!-- Overview  -->
                    <ul class="nav nav-sidebar">
                        <li class="active" ><a id="overview" href="#">Overview</a></li>
                    </ul>

                    <!-- Functionality to manage question bank  -->
                    <ul class="nav nav-sidebar">
                        <li><a href="#" id="question_bank">View Question Bank</a></li>
                        <li><a href="#">Add a Question</a></li>
                    </ul>

                    <!-- Functionality to set question paper  -->
                    <ul class="nav nav-sidebar">
                        <li><a href="#">View Quiz</a></li>
                        <li><a href="#">Set Quiz from Question Bank</a></li>
                        <li><a href="#">Set Custom Quiz</a></li>
                    </ul>

                    <!-- Functionality to view results  -->
                    <ul class="nav nav-sidebar">
                        <li><a href="#">View Results</a></li>
                        <!-- Add different types of results -->
                    </ul>

                    <!-- Any other additional functionality   -->
                    <ul class="nav nav-sidebar">
                        <li><a href="#">Other</a></li>
                    </ul>
                </div>
                <!-- ***********END OF SIDEBAR PANEL************8-->


                <div class="col-sm-9 col-sm-offset-3 main" id="bigdiv">
                    <h1 class="page-header"><strong>QUESTION BANK</strong></h1>

                    <?php
                    session_start();
                    require_once("../model/database.php");



                    //saving all teacher attributes 
                    // !!** add current year clause to query 
                    $query = "SELECT t1.standard, t1.subject_name, q.topic_name, q.level, q.type
                                FROM teaches_class_subject AS t1, question AS q
                                WHERE t1.user_id = '{$_SESSION['user_id']}'
                                AND t1.subject_name = q.subject_name
                                AND t1.standard = q.standard";
                    $result = mysqli_query($connection, $query);
                    $_SESSION['teaches'] = array();
                    while ($row = mysqli_fetch_assoc($result)) {

                        array_push($_SESSION['teaches'], $row);
                    }
                    //  print_r($_SESSION['teaches']);
                    ?>



                    <!--to load the form through ajax -->
                    <div id ="myForm">

                    </div>
                    <!--to load the contents through ajax -->
                    <div id ="myContent">
                    </div>
                </div>

                <!-- ********************************************************************-->

                <!-- include footer -->

                <!-- JavaScript -->
                                
                <script src="../lib/theme/js/jquery-1.10.2.js"></script>
                <script src="../lib/theme/js/bootstrap.js"></script>
                <script src="../lib/theme/js/modern-business.js"></script>
                <script src="../lib/theme/docs-assets/js/holder.js"></script>
                <script src="../controller/teacherupdate.js"></script>
                
                </body>
                </html>
