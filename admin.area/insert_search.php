<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_search'])){
      $search_title=($_POST['search_title']);
      //select data from database
      $select_query="Select * from `search` where  search_title= '$search_title'";
      $result_select=mysqli_query($con,$select_query);
      $number=mysqli_num_rows($result_select);
      if($number>0){
        echo "<script>alert('This search is present inside the database')</script>";
        }else{
      $insert_query="INSERT INTO `search` (search_title) VALUES ('$search_title')";
      $result = mysqli_query($con,$insert_query);
      if($result){
          echo "<script>alert('Search has been inserted successfully')</script>";
      }
  }}
?>
<h2 class="text-center">Insert Search</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="search_title"
    placeholder="Insert Search" aria-label="Search" aria-describedby="basic-addon1">

        
  </div>
  <div class="input-group w-10 mb-2 m-auto">
  
    <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_search"
    value="Insert Search"> 

        
  </div>
</form>