<!-- extract the options based on change in select form -->
<html>

    <head>
        <link href="../lib/theme/css/bootstrap.css" rel="stylesheet">   
        <link href="../lib/theme/css/bootstrap-responsive.min.css" rel="stylesheet">  
    </head>   

    <body>

        <?php
            session_start();
        ?>
        <div id="class_options">
            <?php
                $t=$_SESSION['teaches'];
                for($i=0;$i<count($t);$i++)
                {
                    echo "<option value=\"{$t[$i]['standard']}\">{$t[$i]['standard']}</option>";
                }
            ?>
        </div>

        <script src="../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../lib/theme/js/bootstrap.js"></script>
        <script src="../lib/theme/js/modern-business.js"></script>
        <script src="../lib/theme/docs-assets/js/holder.js"></script>
    </body>

</html>