<?php include("./configue/constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Restaurant Youcode</title>
</head>
<body>

    <nav>
        <div class="logo">
            <img src="./img/Ansamble.png" alt="">
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="<?php echo HOMEURL; ?>admin/login.php">Log in</a></li>
            <li><a href="#">Category</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <div class="main">
        <section class="main__tasteful">
            <img class="tasteful__one" src="./img/tasteful.png" alt="tasteful">   
            <img class="tasteful__two" src="./img/tasteful2.jpg" alt="tasteful">     
        </section>

        <section class="main__food-search">
            <div class="food-search__container">

                <form class="container__search" action="#">

                    <input type="search" name="search" placeholder="search for food ...">
                    <input class="search__button" type="submit" type="submit" value="Search">

                </form>

            </div>

        </section>

        <section class="main__meals">
        <div class="container">
            <h2 class="text-center size">What's Up For This Week</h2>

            <?php

            $sql = "SELECT * FROM category_table WHERE featured='Yes' AND active='Yes' LIMIT 5";

            $res = mysqli_query($connect, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                   
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];

                    ?>


                        <div class="box-3 float-container">
                            <?php

                            if($image_name=="")
                            {
                                echo '<div class="error">Image Not Available</div>';
                            }
                            else
                            {
                                ?>
                                    <img src="<?php echo HOMEURL; ?>img/upload-img/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                <?php
                            }

                            ?>

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>


                    <?php
                }
            }
            else
            {
                echo '<div class="error">Category Not Added</div>';
            }

            ?>
            
            

         
            <div class="clearfix"></div>
        </div>
        </section>
        <section class="main__user">
            <div class="user__shap">
            <div class="user__title">because we care about you<br>tell us what do you like</div>
            <div class="user__creat">if you don't have a compte ! <a class="creat" href="./login.php">creat</a> your own one</div>
            <div class="user__login">
                
                <div class="login__usname">
                <label class="usname__text" for="uname"><b>Username</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="usname__put" type="text" placeholder="Enter Username">
                </div>

                <div class="login__password">
                <label class="password__text" for="psw"><b>Password</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="password__put" type="password" placeholder="Enter Password">
                </div>

                <div class="login__tell">
                <label class="tell__text" for="psw"><b>Tell us</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="tell__put" type="password" placeholder="some thing you want to eat">
                </div>

                <button type="submit">SEND</button>
            </div>
            </div>
        </section>
        <section class="footer">
            <div class="footer__shap">
            <p class="shap__text"><?php echo "BY" ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/ejjraifihamza">Hamza Ejjraifi</a></p>
            </div>
        </section>
    </div> 
    <script src="./script.js"></script>
</body>
</html>