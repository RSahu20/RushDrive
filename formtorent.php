
<?php
session_start();
if(isset($_SESSION['username'])){
  $username =  $_SESSION['username'];
}
include 'connect.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_name = $_POST['carname'];
    $car_id = $_POST['carid'];
    $days = $_POST['numberofdays'];
    $start_date = $_POST['startDate'];

// Define functions before calling them
function isCarAvailable($conn, $car_name, $car_id) {
    $sql = "SELECT * FROM `available_cars` WHERE vehicleModal = '$car_name' AND vehileNumber = '$car_id'";
    $result = mysqli_query($conn , $sql); 
    $num_rows = mysqli_num_rows($result);
    if($num_rows > 0){
      return true;
    }
        return false; 
    }
  
    function bookCar($conn, $username, $car_name, $car_id,  $days , $start_date) {
        $sql = "INSERT INTO `booked_cars` ( customer_name, car_name, car_id, Numberof_days, start_day) 
                VALUES ('$username', '$car_name' ,'$car_id', '$days', '$start_date')";
    
        $result = mysqli_query($conn , $sql); 
        if($result){
         echo "<div class='alert alert-danger' role='alert'>Your car has been 
                   <a href='#' class='alert-link'>Booked</a>. 
</div>";
        //   header('location:carstable.php');
        }else{
            echo "There is some error in booking the car";
        //   header('location:carstable.php');
        }
      }
    if (isCarAvailable($conn , $car_name , $car_id)) {
     
        bookCar($conn, $_SESSION['username'], $car_name, $car_id,  $days, $start_date);
}else{
  echo "<div class='alert alert-danger' role='alert'>Sorry This car is not 
  <a href='#' class='alert-link'>Available</a>. 
</div>";
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;
    0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <style>
        body{
            background-color:   rgb(253, 153, 119);
        }
        .main_container{
            padding: 3rem;
            margin:auto;
            width: 50%;
            background-color: antiquewhite;
        }

        @media (max-width:854px) {
            .main_container{
            width: 100%;
        }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid m-3 p-3 fs-5 bg-light">
    <a class="navbar-brand" >Navbar</a>
    <div class="main_container2">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
</ul>
        </div>
</div>
</nav>
<h1 class="text-center p-2 text text-light fw-bold">Fill This Form to Rent Car</h1>    
<div class="main_container" >

<form method="post" action="formtorent.php" class="row g-3 needs-validation" novalidate>
  <input type="hidden" name="data_id">
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Car name</label>
    <input type="text" class="form-control" name="carname"  required>
  </div>
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Car ID</label>
    <input type="text" class="form-control" name="carid"  required>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Number of Days</label>
    <input type="number" class="form-control" name="numberofdays"  required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustomUsername" class="form-label">Start Date</label>
      <input type="Date" class="form-control" name="startDate" required>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Rent Car</button>
  </div>
  <!-- <div class="col-4">
    <button type="submit" class="btn btn-primary bg-warning border-0"
     name="data"><a class="link-light text-decoration-none" href="admin/Viewbookedcars.php">View Booked cars</a></button>
  </div> -->
</form>

</div>
</body>
</html>