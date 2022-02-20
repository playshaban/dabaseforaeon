<?php


session_start();

if(!isset($_SESSION['login_id']))
{
    ?> <script> location.href = 'index.php' </script> <?php
}

?>


<!DOCTYPE html>
<head>
<title>AL Databse</title>
<link rel="stylesheet" href="welcome.css">

</head>
<body>
    <div class="container">
        <header>
            <div class="logo"><img src="https://www.aeonlogiciel.com/images/logo-1.png" width="15%" alt=""></div>
            </header>
            <h1> AEON LOGICIEL EMPLOYEE DATEBASE </h1>
        <h2>Choose the actions</h2>
        <ol>
            <li>
                <a href="view_d.php"> View The Databse</a>
            </li>
            
            <li>
                <a href="logout.php">Logout</a>
            </li>
           
        </ol>

    </div>
</body>