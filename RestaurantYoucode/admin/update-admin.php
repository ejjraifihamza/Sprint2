<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="hadmin">Update Admin</h1>

        <br><br>

        <?php 
            $id=$_GET['id'];

            $sql="SELECT * FROM admin_table WHERE id=$id";

            $res=mysqli_query($connect, $sql);

            if($res==true)
            {
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $user_name = $row['user_name'];
                }
                else
                {
                    header('location:'.HOMEURL.'admin/manage-admin.php');
                }
            }
        
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="user_name" value="<?php echo $user_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php 

    if(isset($_POST['submit']))
    {   
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];

        $sql = "UPDATE admin_table SET
        full_name = '$full_name',
        user_name = '$user_name' 
        WHERE id='$id'
        ";

        $res = mysqli_query($connect, $sql);

        if($res==true)
        {
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            
            header('location:'.HOMEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
            
            header('location:'.HOMEURL.'admin/manage-admin.php');
        }
    }

?>


<?php include('partial/footer.php'); ?>