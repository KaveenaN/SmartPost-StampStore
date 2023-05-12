<?php
include('../includes/connect.php');

if(isset($_POST['insert_stamp'])){
    $stamp_title = $_POST['stamp_title'];
    $stamp_description = $_POST['stamp_description'];
    $stamp_keywords = $_POST['stamp_keywords'];
    $stamp_dimensions = $_POST['stamp_dimensions'];
    $stamp_price = $_POST['stamp_price'];
    $stamp_date = $_POST['stamp_date'];
    $stamp_quantity = $_POST['stamp_quantity'];
    $stamp_status = 'true';

    //accessing images
    $stamp_image = $_FILES['stamp_image']['name'];

    //accessing image temp name
    $temp_image = $_FILES['stamp_image']['tmp_name'];

    //checking empty condition
    if(empty($stamp_title) || empty($stamp_description) || empty($stamp_keywords) || empty($stamp_dimensions)
        || empty($stamp_price) || empty($stamp_date) || empty($stamp_quantity) || $_FILES['stamp_image']['error'] !== 0){
        echo "Please fill all the fields";
        exit();
    } else {
        move_uploaded_file($temp_image, "./stamp_images/$stamp_image");

        //insert query
        $insert_stamps = "INSERT INTO `stamps` (stamp_title, stamp_description, stamp_keywords, stamp_dimensions,
            stamp_price, stamp_date, stamp_quantity, status, stamp_image) VALUES ('$stamp_title', '$stamp_description',
            '$stamp_keywords', '$stamp_dimensions', '$stamp_price', '$stamp_date', '$stamp_quantity', '$stamp_status', '$stamp_image')";
        $result_query = mysqli_query($con, $insert_stamps);
        if($result_query){
            echo "Successfully inserted stamps";
        } else {
            echo "Error inserting stamps: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Insert Stamps</title>
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
            <div class="container mt-3">
                <h1 class="text-center">Insert Stamps</h1>
                <!-- form -->
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- title -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="stamp_title" class="form-label">Stamp Title</label>
                        <input type="text" name="stamp_title"
                        id="stamp_title" class="form-control" 
                        placeholder="Enter Stamp Title" autocomplete="off"
                        required="required">
                    </div>

                    <!-- description -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="description" class="form-label">Stamp Description</label>
                        <input type="text" name="stamp_description"
                        id="stamp_description" class="form-control" 
                        placeholder="Enter Stamp Description" autocomplete="off"
                        required="required">
                    </div>

                    <!-- keywords -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="stamp_keywords" class="form-label">Stamp Keywords</label>
                        <input type="text" name="stamp_keywords"
                        id="stamp_keywords" class="form-control" 
                        placeholder="Enter Stamp Keywords" autocomplete="off"
                        required="required">
                    </div>

                    <!-- Dimensions -->
                    <div class="form-outline mb-4 w-50 m-auto">
                    <label for="stamp_dimensions" class="form-label">Size of Stamp</label>
                        <select name="stamp_dimensions" id="" class="form-select">
                            <option value="0">Select Dimension</option>
                            <option value="1">60mm * 30mm</option>
                            <option value="2">41mm * 30mm</option>
                            <option value="3">25mm * 20mm</option>

                        </select>
                    </div>
                    <!-- price -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="stamp_price" class="form-label">Stamp Price</label>
                        <input type="text" name="stamp_price"
                        id="stamp_price" class="form-control" 
                        placeholder="Enter Price" autocomplete="off"
                        required="required">
                    </div>

                    <!-- Date of Issue -->
                    <div class="form-outline mb-4 w-50 m-auto">
                    <label for="stamp_date" class="form-label">Year of Issue</label>
                    <input type="year" name="stamp_date"
                        id="stamp_date" class="form-control" 
                        placeholder="Enter Year" autocomplete="off"
                        required="required">
                            

                        </select>
                    </div>

                    <!-- Availabale Quantity -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="stamp_quantity" class="form-label">Available Quantity</label>
                        <input type="number" name="stamp_quantity"
                        id="stamp_quantity" class="form-control" 
                        placeholder="Enter Available Quantity" autocomplete="off"
                        required="required">
                    </div>

                    <!-- Image -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="stamp_image" class="form-label">Image</label>
                        <input type="file" name="stamp_image"
                        id="stamp_image" class="form-control" 
                        required="required">
                    </div>

                    <!-- Submit -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <input type="submit" name="insert_stamp"
                        class="btn btn-info mb-3 px-3" value="Insert Stamp">
                        
                    </div>

                    




                </form>
            </div>

    
        </body>
</html>