<?php
 require("./../db/db.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login page</title>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="mycs.css"/>
    </head>
    <body>
        <div class="login">
            <div class="logo">
            </div>
            <div class="title">Admin Login</div>
            <form method="POST" > 
            <div class="fields">
                <div class="username">
                    <input type="text" class="user-input" name="adminname"
                    placeholder="Admin Name"/>
                </div>
                <div class="password">
                    <input type="password" class="pass-input" name="adminpassword"
                    placeholder="password"/>
                </div>
            </div>
            <button class="signin" name="signin">Login</button>
           </form>

        </div>
        <?php
        if(isset($_POST['signin']))
        {
            $query="SELECT * FROM `admin_login` WHERE `admin_name`='$_POST[adminname]' AND `admin_password`='$_POST[adminpassword]'";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)==1)
            {
                session_start();
                $_SESSION['AdminLoginId']=$_POST['adminname'];
                header("location:donate.php");
        
            }
            else {
                echo  "<script>alert('Wrong password')</script>";
            }
        }
        ?>
    </body>
</html> 