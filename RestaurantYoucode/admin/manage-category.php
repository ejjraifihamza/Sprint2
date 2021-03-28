<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="hadmin">Manage Category</h1>
        <br/><br/>

        <?php

         if(isset($_SESSION['add']))
         {
             echo $_SESSION['add'];
             unset ($_SESSION['add']);
         }

         if(isset($_SESSION['delete']))
         {
             echo $_SESSION['delete'];
             unset ($_SESSION['delete']);
         }

        ?>
        <br><br>

        <a href="<?php echo HOMEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
              <br/><br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php

                    $sql = "SELECT * FROM category_table";

                    $res = mysqli_query($connect, $sql);

                    $count = mysqli_num_rows($res);

                    $sn = 1;

                    if($count>0)
                    {
                        // ! we have data in database
                        // get the data and display 
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                            ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>

                                        <td>


                                        <?php

                                        if($image_name!="")
                                        {

                                            ?>

                                            <img class="fix-img-width" src="<?php echo HOMEURL; ?>img/upload-img/<?php echo $image_name; ?>" >

                                            <?php

                                        }
                                        else
                                        {
                                            echo '<div class="error">Image Not Added</div>';
                                        }

                                        ?>
                                            
                                    
                                        </td>

                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="#" class="btn-secondary">Update Category</a>
                                            <a href="<?php echo HOMEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                                        </td>
                                    </tr>

                            <?php

                        }

                    }
                    else
                    {
                        // ! we do not have data in database and display the msg inside the table 
                        ?>

                        <tr>
                            <td colspan="2"><div class="error">NO Category Added</div></td>
                        </tr>

                        <?php

                    }

                ?>


                
            </table>
    </div>
</div>


<?php include('partial/footer.php'); ?>

