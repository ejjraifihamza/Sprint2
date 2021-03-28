<?php include('partial/menu.php'); ?>


    <div class="main-content">
        <div class="wrapper">
            <h1 class="hadmin">DASHBOARD</h1>
            <br><br>

            <?php 
            
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            
            ?>

            <br><br>



            <div class="col-4 text-centre" >
                <h1>1</h1>
                </br>
                categories
            </div>
            <div class="col-4 text-centre" >
                <h1>2</h1>
                </br>
                categories
            </div>
            <div class="col-4 text-centre" >
                <h1>3</h1>
                </br>
                categories
            </div>
            <div class="col-4 text-centre" >
                <h1>4</h1>
                </br>
                categories
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>

   
    <?php include('partial/footer.php') ?>

   