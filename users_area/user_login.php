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
        <!-- css file -->
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text_center w-50 m-auto">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-x1-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!--username field -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control"
                        placeholder="Enter Your Username" autocomplete="off" required="required" name="user_username"/>
                    </div>

                    <!-- password field-->
                    <div class="form-outline mb-4  w-50 m-auto">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control"
                        placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    </div>

                    <div class="mt-4 pt-2 w-50 m-auto">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 
                        border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger"> Register</a> </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
</body>
</html>