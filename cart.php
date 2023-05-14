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
        <title>Cart Details</title>
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
        <style>
            .cart_img{
                width: 80px;
                height: 80px;
                object-fit: contain;
            }
            </style>
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
                <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item();?><sup></a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- calling cart function-->
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
                <a class="nav-link" href="#">Login</a>
            </li>
        </ul>
    </nav>

    <!-- third child -->
    <div class="bg-light">
        <h3 class="text-center">Stamp Store</h3>
        <p class="text-center">Department of Posts
    Sri Lanka</p>
    </div>

    <!-- fourth child-table -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">
                
                        <!-- php code to display dynamic data-->
                        <?php
    
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    $result_count=mysqli_num_rows($result);
    if($result_count>0){
        echo" <thead>
        <tr>
            <th>Stamp Title</th>
            <th>Stamp Image</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Remove</th>
            <th colspan='2'>Operations</th>
        </tr>
    </thead>
    <tbody>";
    while($row = mysqli_fetch_array($result)){
        $stamp_id = $row['stamp_id'];
        $select_stamps = "SELECT * FROM `stamps` WHERE stamp_id='$stamp_id'";
        $result_stamps = mysqli_query($con, $select_stamps);
        while($row_stamp_price = mysqli_fetch_array($result_stamps)){
            $stamp_price = $row_stamp_price['stamp_price']; 
            $price_table = $row_stamp_price['stamp_price'];
            $stamp_title = $row_stamp_price['stamp_title'];
            $stamp_image = $row_stamp_price['stamp_image'];
            $total_price += $stamp_price; 
        
    ?>


                    <tr>
                        <td><?php echo $stamp_title?></td>
                        <td><img src="./admin.area/stamp_images<?php echo $stamp_images?>" alt="" class="cart_img"></td>
                        <td><input type="text" name="qty" class="form-input w-50"></td>
                        <?php
    $get_ip_add = getIPAddress();
    if (isset($_POST['update_cart'])) {
        $quantities = $_POST['qty'];
        
        // Convert quantities to integer
        $quantities = intval($quantities);
        
        $update_cart = "UPDATE `cart_details` SET quantity = $quantities WHERE ip_address = '$get_ip_add'";
        $result_stamps_quantity = mysqli_query($con, $update_cart);
        
        if ($result_stamps_quantity) {
            $total_price = intval($total_price) * $quantities;
        } else {
            // Handle the error case
            echo "Error updating cart: " . mysqli_error($con);
        }
    }
?>


                        <td><?php echo $price_table?>/-</td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $stamp_id ?>"></td>
                        <td>
                            <!--<button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                            <input type="submit" value="Update" class="bg-info px-3 py-2 border-o mx-3"
                            name="update_cart">
                            <!--<button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                            <input type="submit" value="Remove" class="bg-info px-3 py-2 border-o mx-3"
                            name="remove_cart">
                        </td>

                    </tr>
                    <?php
                        }
                    }}

                    else{
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    }
                    ?>
                </tbody>

            </table>
            <!--subtotal -->
            <div class="d-flex mb-5">
                <?php
                $get_ip_add = getIPAddress();
                $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                $result = mysqli_query($con, $cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                    echo " <h4 class='px-3 border=0'>Subtotal:<strong class='text-info'>$total_price/-</strong></h4>
                    <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-o mx-3'
                    name='continue_shopping'>
                    <button class='bg-secondary p-3 py-2 border-0'><a href='./users_area/checkout.php' class='text_light 
                    text-decoration-none'>CheckOut</a></button>";
                }else{
                    echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-o mx-3'
                    name='continue_shopping'>";
                }
                if(isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php','_self')</script>";
                }
            ?>
            </div>

        </div>
    </div>
                </form>

    <!-- function to remove item-->
    <?php
    function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart']) && isset($_POST['removeitem'])){
            foreach($_POST['removeitem'] as $remove_id){
                $remove_id = mysqli_real_escape_string($con, $remove_id); // Sanitize the value
                
                $delete_query = "DELETE FROM `cart_details` WHERE stamp_id='$remove_id'";
                $run_delete = mysqli_query($con, $delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    
    remove_cart_item();
    
    
    ?>





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