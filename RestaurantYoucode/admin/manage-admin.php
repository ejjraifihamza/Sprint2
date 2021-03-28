<?php include('partial/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1 class="hadmin">Manage Admin</h1>
              <br/><br/>

                 <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; 
                        unset($_SESSION['add']); 
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }

                 ?>

               <br><br><br>

              <a href="add-admin.php" class="btn-zero">Add Admin</a>
              <br/><br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

                <?php
                
                $sql = "SELECT * FROM admin_table";
                
                $res = mysqli_query($connect, $sql);

                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res); 

                    $sn = 1;

                    if($count>0)
                    {

                        while($rows = mysqli_fetch_assoc($res)) // todo talk about the diff btw assoc,row,array
                        {
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $user_name = $rows['user_name'];


                            ?>


                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $user_name; ?></td>
                                    <td>
                                        <a href="<?php echo HOMEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                        <a href="<?php echo HOMEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo HOMEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>


                            <?php

                        }
                    }
                    else
                    {
                        // we do not have data in db
                    }
                }
                
                ?>

                
            </table>
          

        </div>
    </div>


<?php include('partial/footer.php') ?>