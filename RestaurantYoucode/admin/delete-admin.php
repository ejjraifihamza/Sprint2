<?php

include('../configue/constants.php');

$id = $_GET['id'];

$sql = "DELETE FROM admin_table WHERE id=$id";

$res = mysqli_query($connect, $sql);

if($res==true)
{
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
    
    header('location:'.HOMEURL.'admin/manage-admin.php');
}
else
{
    echo "failed to delet admin";
    
    $_SESSION['delete'] = "<div class='failed'>Failed to deleted admin, please try again later</div>";

    header('location:'.HOMEURL.'admin/manage-admin.php');
}


?>