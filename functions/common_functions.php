<?php

// including connect file


//getting stamps
function getstamps(){
    global $con;

    //condition to check isset or not

    
    $select_query="select * from `stamps` order by rand() LIMIT 0,9";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $stamp_id=$row['stamp_id'];
                $stamp_title=$row['stamp_title'];
                $stamp_description=$row['stamp_description'];
                $stamp_keywords=$row['stamp_keywords'];
                $stamp_dimensions=$row['stamp_dimensions'];
                $stamp_price=$row['stamp_price'];
                $stamp_date=$row['stamp_date'];
                $stamp_quantity=$row['stamp_quantity'];
                $stamp_image=$row['stamp_image'];
                echo " <div class='col-md-4 mb-2'>
                <div class='card'>
                    <img src='./admin.area/stamp_images/$stamp_image' class='card-img-top' alt='$stamp_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$stamp_title</h5>
                        <p class='card-text'>$stamp_description</p> 
                        <p class='card-text'>Price: $stamp_price/-</p>
                        <a href='index.php?add_to_cart=$stamp_id' class='btn btn-info'>Add to cart</a>
                        <a href='stamp_details.php?stamp_id=$stamp_id' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
            </div>
            
            <div class='col-md-8'>
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related stamps</h4>
                </div>
                <div class='col-md-6'>
                <img src='images/vesak2.jpg' class='card-img-top' 
                alt='$stamp_title'>

                </div>
                <div class='col-md-6'>
                <img src='images/vesak3.jpg' class='card-img-top' 
                alt='$stamp_title'>
                    
                </div>
            </div>
            </div>
            
            ";
                
}
}


//getting all stamps
function get_all_stamps(){
    global $con;

 
        $select_query="select * from `stamps` order by rand()";
                $result_query=mysqli_query($con,$select_query);
                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows==0)
                    echo "<h2 class='text-center text danger'> No results match.</h2>";
                
                while($row=mysqli_fetch_assoc($result_query)){
                    $stamp_id=$row['stamp_id'];
                    $stamp_title=$row['stamp_title'];
                    $stamp_description=$row['stamp_description'];
                    $stamp_keywords=$row['stamp_keywords'];
                    $stamp_dimensions=$row['stamp_dimensions'];
                    $stamp_price=$row['stamp_price'];
                    $stamp_date=$row['stamp_date'];
                    $stamp_quantity=$row['stamp_quantity'];
                    $stamp_image=$row['stamp_image'];
                    echo " <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin.area/stamp_images/$stamp_image' class='card-img-top' alt='$stamp_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$stamp_title</h5>
                            <p class='card-text'>$stamp_description</p>
                            <p class='card-text'>Price: $stamp_price/-</p>
                            <a href='index.php?add_to_cart=$stamp_id' class='btn btn-info'>Add to cart</a>
                            <a href='stamp_details.php?stamp_id=$stamp_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";
                }
}


//displaying search in sidenav
function getsearch(){
    global $con;
    $select_search="Select * from `search`";
                    $result_search=mysqli_query($con,$select_search);
                    while($row_data=mysqli_fetch_assoc($result_search)){
                        $search_title=$row_data['search_title'];
                        $search_id=$row_data['search_id'];
                        echo "<li class='nav-item'>
                        <a href='index.php?search=$search_id' class='nav-link text-light'>$search_title</a>
                    </li>";
                    }
}

//displaying categories in sidenav
function getcategories(){
    global $con;
    $select_categories="Select * from `categories`";
                    $result_categories=mysqli_query($con,$select_categories);
                        while($row_data=mysqli_fetch_assoc($result_categories)){
                        $category_title=$row_data['category_title'];
                        $category_id=$row_data['category_id'];
                        echo "<li class='nav-item'>
                        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                    </li>";
                    }
}


//searching stamp function

function search_stamp(){
    global $con;
    if(isset($_GET['search_data_stamp'])){
        $search_data_value=$_GET['search_data'];
    $search_query="Select * from `stamps` where stamp_keywords like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No results match</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
                            $stamp_id=$row['stamp_id'];
                            $stamp_title=$row['stamp_title'];
                            $stamp_description=$row['stamp_description'];
                            $stamp_keywords=$row['stamp_keywords'];
                            $stamp_dimensions=$row['stamp_dimensions'];
                            $stamp_price=$row['stamp_price'];
                            $stamp_date=$row['stamp_date'];
                            $stamp_quantity=$row['stamp_quantity'];
                            $stamp_image=$row['stamp_image'];
                            echo " <div class='col-md-4 mb-2'>
                        <div class='card'>
            <img src='./admin.area/stamp_images/$stamp_image' class='card-img-top' alt='$stamp_title'>
            <div class='card-body'>
                <h5 class='card-title'>$stamp_title</h5>
                <p class='card-text'>$stamp_description</p>
                <p class='card-text'>Price: $stamp_price/-</p>
                <a href='index.php?add_to_cart=$stamp_id' class='btn btn-info'>Add to cart</a>
                <a href='stamp_details.php?stamp_id=$stamp_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div>";

        
}
}
}

//view details function
function view_details(){
    global $con;
      //condition to check isset or not
    if(isset($_GET['stamp_id'])){
    if(isset($_GET['category'])){
        $product_id=$_GET['stamp_id'];
    $select_query="select * from `stamps` where stamp_id=$product_id";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo "<h2 class='text-center text danger'> No results match.</h2>";
            while($row=mysqli_fetch_assoc($result_query)){
                $stamp_id=$row['stamp_id'];
                $stamp_title=$row['stamp_title'];
                $stamp_description=$row['stamp_description'];
                $stamp_keywords=$row['stamp_keywords'];
                $stamp_dimensions=$row['stamp_dimensions'];
                $stamp_price=$row['stamp_price'];
                $stamp_date=$row['stamp_date'];
                $stamp_quantity=$row['stamp_quantity'];
                $stamp_image=$row['stamp_image'];
                echo " <div class='col-md-4 mb-2'>
                <div class='card'>
                    <img src='./admin.area/stamp_images/$stamp_image' class='card-img-top' alt='$stamp_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$stamp_title</h5>
                        <p class='card-text'>$stamp_description</p>
                        <p class='card-text'>Price: $stamp_price/-</p>
                        <a href='index.php?add_to_cart=$stamp_id' class='btn btn-info'>Add to cart</a>
                        <a href='index.php' class='btn btn-secondary'>GO home</a>
                    </div>
                </div>
            </div>";
                
}
}
}
}
}
//get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
//whether ip is from the remote address  
    else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 


//cart function
function cart()
{
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $get_stamp_id = $_GET['add_to_cart'];

        $select_query = "select * from cart_details where ip_address = '$get_ip_add' AND stamp_id = '$get_stamp_id'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows > 0){
            echo '<script>alert("This stamp is already present inside the cart");</script>';
            echo '<script>window.open("index.php","_self");</script>';
        } else {
            $insert_query = "insert into `cart_details` (stamp_id, ip_address, quantity) values ('$get_stamp_id', '$get_ip_add', 0)";
            $result_query = mysqli_query($con, $insert_query);
            echo '<script>alert("Stamp is added to  cart");</script>';
            echo '<script>window.open("index.php","_self");</script>';
        }
    }
}

//function to get cart item  numbers
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }else{
        global $con;
        $get_ip_add = getIPAddress();
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
    }

    //total price function
    function total_cart_price(){
        global $con;
        $get_ip_add = getIPAddress();
        $total_price = 0;
        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result = mysqli_query($con, $cart_query);
        while($row = mysqli_fetch_array($result)){
            $stamp_id = $row['stamp_id'];
            $select_stamps = "SELECT * FROM `stamps` WHERE stamp_id='$stamp_id'";
            $result_stamps = mysqli_query($con, $select_stamps);
            while($row_stamp_price = mysqli_fetch_array($result_stamps)){
                $stamp_price = $row_stamp_price['stamp_price']; 
                $total_price += $stamp_price; 
            }
        }
        echo $total_price;
    }
    
?>