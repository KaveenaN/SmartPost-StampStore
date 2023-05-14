<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_functions.php');



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" contents="IE=edge">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Stamp Store</title>
        <!-- bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        intergrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css file -->
        <link rel="stylesheet" href="style.css">
    </head>


<body>
        <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-info">
      <div class="container-fluid">
        <img src="./images/logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php"><i class="fa-solid fa-envelopes-bulk"></i>Stamps</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i>Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-phone" aria-hidden="true"></i>Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php cart_item();?></a>
            </li>
            <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
          </ul>
          <form class="d-flex" action="" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            
            <input type="submit" value="search" class="btn  btn-outline-light" name="search_data_stamp">
          </form>
        </div>
      </div>
    </nav>
 
     <!-- calling cart function -->
     <?php
    cart();
    ?>



<!-- second child -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="users_area/user_login.php">Login</a>
      </li>
    </ul>
  </nav>

<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">Stamp Store</h3>
    <p class="text-center">Department of Posts
Sri Lanka</p>
</div>

<!-- fourth child -->
<div class="row px-1">
    <div class="col-md-10 ">
        <!-- stamps -->
        <div class="row">
            <!-- fetching stamps -->
            <?php
            // calling function
            search_stamp();
            ?>
          

            <!--row end -->
        </div>
        <!-- co end -->
    </div>
 
    
    




    <div class="col-md-2  bg-secondary p-0">
            <!-- categories -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>
                    <?php
                    getcategories();
                    ?>
                </ul>

        <!-- search -->

                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>search</h4></a>
                    </li>
                    <?php
                    getsearch();
                    ?>
                </ul>

        

    </div>
</div>

    <!-- last child -->
    <!-- include footer -->
    <?php 
    include("./includes/footer.php")
    ?>

</div>

        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" 
            crossorigin="anonymous"></script> 
    </body>
</html>