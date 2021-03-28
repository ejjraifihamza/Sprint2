<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="hadmin">Add Admin</h1>
        <br><br>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="full_name" placeholder="enter your full_name"></td>
            </tr>

            <tr>
                <td>User Name</td>
                <td><input type="text" name="user_name" placeholder="enter your user_name"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="your password"></td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                </td>
            </tr>
        </table>

        </form>
    </div>
</div>

<?php include('partial/footer.php'); ?>

<?php
// procces the value from form and save it in database
// check whether the submit button is clicked or not 

if(isset($_POST['submit']))
{
    // button clicked
    // echo "button clicked";

    // get the data from form
    $full_name = $_POST['full_name'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    // save the data into database

    $sql = "INSERT INTO admin_table SET
      full_name = '$full_name',
      user_name = '$user_name',
      password = '$password'";

    

    $res = mysqli_query($connect, $sql) or die(mysqli_error());

    // check whether the query is axecuted and data is insert or not 

    if($res==true){
        // data is insert
        // echo "data is inserted";
        // creat a session variable to display message
        $_SESSION['add'] = '<div class="success">Admin Added Successfully</div>';
        // redirect page
        header('location:'.HOMEURL.'admin/manage-admin.php');
    }
    else{
        // creat a session variable to display message
        $_SESSION['add'] = '<div class="failed">Admin Added Failed</div>';
        // redirect page
        header('location:'.HOMEURL.'admin/add-admin.php');
    }

}





?>