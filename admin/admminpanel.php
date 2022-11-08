<?php
 session_start();
 if(!isset($_SESSION['AdminLoginId']))
 {
     header("location:adminlogin.php");
 }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./../css1/st.css">
        <!-- <style>
            body{
                margin:0px;
            }
            div.header{
                justify-content:space-between;
                display:flex;
                color:white;
                font-family:poppins;
                align-items:center;
                padding: 0px 60px;
                background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(background.jpg);
            }
            div.header button{
                background-color:#f0f0f0;
                font-size:16px;
                font-weight:550;
                padding: 8px 12px;
                border:2px solid black;
                border-radius:10px;
            }
        </style>     -->
    </head>
    <body>
        <div class="header">
        <h1>ADMIN PANEL -<?php echo $_SESSION['AdminLoginId']?></h1>
        <form method="POST">
        <button name="logout">LOG OUT</button>
        </form>
        </div>
        <?php
        if(isset($_POST['logout']))
        {
            session_destroy();
            header("location:adminlogin.php");
        }
        ?>
    </body>
</html>