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

        <!-- Add custom CSS here -
        <link href="../lib/theme/css/modern-business.css" rel="stylesheet">
        <link href="../lib/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../lib/theme/css/mystyle.css" rel="stylesheet"> -->
        <link href="../lib/theme/css/sidebar.css" rel="stylesheet">
    </head>

    <body >

        <?php include('header.php'); ?>


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 sidebar">
                    <!-- Overview  -->
                    <ul class="nav nav-sidebar">
                        <li class="active" ><a id="overview" href="#">Overview</a></li>
                    </ul>
                    
                    <!-- Functionality to manage question bank  -->
                    <ul class="nav nav-sidebar">
                        <li><a href="#">View Question Bank</a></li>
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
                
                
                <div class="col-sm-9 col-sm-offset-3 main">
                    <h1 class="page-header">EXTRATED STUDENT DATA</h1>
                    <div id ="result">
                        
                    </div>

                  
                 </div>

        <!-- ********************************************************************-->
        <?php include('footer.php'); ?>

        <!-- JavaScript -->
        <script src="../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../lib/theme/js/bootstrap.js"></script>
        <script src="../lib/theme/js/modern-business.js"></script>
        <script src="../lib/theme/docs-assets/js/holder.js"></script>
        <script src="allStudents.js"></script>

    </body>
</html>
