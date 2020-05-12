<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Include JS File Here -->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <!--Choose a different font-->
    <style type="text/css">
        *{
            margin: 0; /*top, right, bottom, and left*/
            padding: 0;
            list-style-type: none;
        }

        body{
            /*More font: https://www.tutorialbrain.com/css_tutorial/css_font_family_list/*/
            font-family: Arial;
            background-color: #F7DAD4;
        }

        ul li ul{
            /*Place the element exactly where your want it*/
            position: absolute;
            display: none; /*Hidden Secondary menu*/
            background: #FD3A0F; /*Set background to white*/
            /*border-style: solid; /*more styles: https://www.w3schools.com/cssref/pr_border-style.asp*/
            /*border-color: hotpink; /*after border-style*/
            /*border-radius: 5px;*/
            font-family:Impact;


        }

        ul li ul li{
            display:block; /*in different line*/
            font-family:Impact;
            background-color:#236AB9;
        }

        ul li:hover ul{
            display: block;
        }
        ul li{
            display: inline-block; /*Display in one line*/
            font-family:Impact;
            /*background-color: #236AB9;*/
        }

        .m2 {
            padding-left: 50px;
        }

        #logout{
            position: relative;float:right;
             padding:0px 10px;
            /* margin: 0px 0px 0px 700px; */
        }
        a {
            text-decoration: none; /*Remove '_'*/
            display:block;
            color: black;
            padding: 10px;
        }

        .link2:hover{
            background: #FBA90A;
        }


        a:hover{
            /*border-radius: 5px;/*round corner*/
            background-color: #FBA90A; /*red*/
        }

        /*Dispaly second menu*/
        .link li:hover ul{
            display: block;
        }

        #menubackground{
            width: 100%;
            background-color: #236AB9;
        }

    </style>
    <script type="text/javascript">
    </script>
</head>
<body>
<div>
<ul class ="menu">
<?php
    include_once 'logic.php';
    my_session_start();
    //Hidden warning, notice info
    //error_reporting(E_ERROR | E_PARSE);
    echo <<<_END
            <li id = "m1">
                <a href="./welcome.php?user=$_SESSION[username]" class="link">Home</a>
            </li>
            </li>
            <li class="m2">
                <a href="./number_recognition.php?user=$_SESSION[username]" class="link">Number Recognition Game</a>
            </li>
            </li>
            <li class="m2">
                <a href="./addition.php?user=$_SESSION[username]" class="link">Addition Game</a>
            </li>
            </li>
            <li class="m2">
                <a href="./subtraction.php?user=$_SESSION[username]" class="link">Subtraction Game</a>
            </li>
        _END;

?>
<?php
    //echo $_SESSION['user_type'];

    if($_SESSION['user_type'] == "teacher"){
        echo <<<_END
        <li class="m2">
            <a href="./student_progress.php?user=$_SESSION[username]" class="link">View Student Progress</a>
        </li>
        _END;
    }
    elseif ($_SESSION['user_type'] == "student") {
      echo <<<_END
      <li class="m2">
      <a href="./session_progress.php?user=$_SESSION[username]" class="link">View Progress</a>
      </li>
      _END;
    }
?>
<?php
    session_start();
    echo <<<_END
        <li id="logout">
            <a href= "" class="link">$_SESSION[username]</a>
            <ul class = "menulist">
                <li><a href="logic.php?method=1" class= "link2">logout</a></li>
                <li><a href="delete_account.php" class= "link2">Delete Account</a></li>
            </ul>
        </li>
    _END;
?>
</ul>
</div>
</body>
</html>
