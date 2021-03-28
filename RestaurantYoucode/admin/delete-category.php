<?php

include('../configue/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name!="")
    {
        // ! image is available so remove it and to remove it i need path of img
        $path = "../img/upload-img".$image_name;
        
        $remove = unlink($path);



    }

    $sql = "DELETE FROM category_table WHERE id=$id";

    $res = mysqli_query($connect, $sql);

    if($res==true)
        {
            
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            
            header('location:'.HOMEURL.'admin/manage-category.php');
        }
        else
        {
            
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
            
            header('location:'.HOMEURL.'admin/manage-category.php');
        }
} 
else
{
    header('location:'.HOMEURL.'admin/manage-category.php');
}

?>