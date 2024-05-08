<?php  include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Details OF Cars</title>
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
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid m-3 p-3 fs-5 bg-light">
    <a class="navbar-brand" >Navbar</a>
    <div class="main_container2">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home_agency.php">Home</a>
        </li>
</ul>
        </div>
</div>
</nav>
   <div class="container">
   <h1 class="text-center p-4 text text-light fw-bold">Add New Cars</h1> 
   <table class="table table-danger table-striped mx-auto border border-success" style="width: 95%;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Vehicle Model</th>
      <th scope="col">Vehicle Number</th>
      <th scope="col">Seating Capacity</th>
      <th scope="col">Rent per Day</th>
      <th scope="col">Edit Details</th>
    </tr>
  </thead>
  <?php
$get_data = mysqli_query($conn , "select * from `available_cars`");
$num_rows = mysqli_num_rows($get_data);
$num = 1;
if($num_rows > 0){
        while($row = mysqli_fetch_assoc($get_data)){
            ?>

            <tbody>
            <tr>
            <td><?php echo $num ?></td>
              <th scope="row"><?php echo $row['vehicleModal'] ?></th>
              <td><?php echo $row['vehileNumber'] ?></td>
              <td><?php echo $row['seatingCapacity'] ?></td>
              <td><?php echo $row['Rent'] ?></td>
              <td><a href="edit_car_details.php?edit=<?php echo $row['id'] ?>">Edit Details</a></td>
              
            </tr>
          </tbody>

          <?php
                $num++;}
             }
           ?>
</table>
   </div> 
</body>
</html>