<?php 
include('../includes/connect.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Registration</title>
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
            <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3 w-50 m-auto">
        <h2 class="text_center">New User Registration</h2>

                <form action="" method="post" enctype="multipart/form-data">
                    <!--username field -->
                    <div class="form-outline mb-4  w-50 m-auto">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control"
                        placeholder="Enter Your Username" autocomplete="off" required="required" name="user_username"/>
                    </div>

                    <!-- user email field -->
                    <div class="form-outline mb-4  w-50 m-auto">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control"
       placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email"/>

                    </div>

                    <!-- password field-->
                    <div class="form-outline mb-4  w-50 m-auto">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control"
                        placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password"/>
                    </div>

                    <!--  confirm password field-->
                    <div class="form-outline mb-4  w-50 m-auto">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="conf_user_password" class="form-control"
                        placeholder="Confirm Password" autocomplete="off" required="required" name="conf_user_password"/>
                    </div>

                    <!--address field -->
                    <div class="form-outline mb-4  w-50 m-auto">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control"
                        placeholder="Enter Your Address" autocomplete="off" required="required" name="user_address"/>
                    </div>

                    <!--contact field -->
                    <div class="form-outline mb-4  w-50 m-auto">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control"
                        placeholder="Enter Your Mobile Number" autocomplete="off" required="required" name="user_contact"/>
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 
                        border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-danger"> Login</a> </p>
                    </div>
                </form>

    </div>
    
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_mobile = $_POST['user_contact'];
    
    $user_ip=getIPAddress();

    //select query
    $select_query="Select * from `user_table` where user_name='$user_username' OR
    user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username or Email already exist')</script>";

    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Password do not match')</script>";
           //insert query
    }
           $insert_into = "INSERT INTO `user_table` (user_name, user_email, user_password, user_ip, user_address, user_mobile) 
           VALUES ('$user_username', '$user_email', '$hash_password', '$user_ip', '$user_address', '$user_mobile')";
$sql_execute = mysqli_query($con, $insert_into);

if ($sql_execute) {
echo "<script>alert('Data inserted successfully')</script>";
} else {
die(mysqli_error($con));
}



}

?>