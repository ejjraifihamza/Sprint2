<?php include('../configue/constants.php'); ?>


<html>
    <head>
        <title>log in</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="log">
        <div class="login">
            <h1 class="text-centre hadmin">login</h1>
            <br><br>

            <?php 

            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            
            ?>

            <form action="" method="POST" class="text-centre font">
                Username <br>
                <input type="text" name="user_name" placeholder="Enter Username"><br><br>
                Password <br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>
                <input type="submit" name="submit" value="login" class="btn-primary">
                <br><br>

            </form>

        </div>
    </body>
</html>

<?php 




if(isset($_POST['submit']))
{
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_table WHERE user_name = '$username' AND password = '$password'";

    $res = mysqli_query($connect, $sql);

    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $_SESSION['login'] = "<div class='success'>Login Successfully</div>";

        header('location:'.HOMEURL.'admin/index.php');
    }
    else
    {
        $_SESSION['login'] = "<div class='success'>Login Failed</div>";

        header('location:'.HOMEURL.'admin/login.php');
        
    }

    
}




?>