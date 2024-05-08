<?php  include 'connect.php';
if(isset($_POST['submit'])){
  $take_id = $_POST['data_id'];
  $vname = $_POST['vname'];
  $vnumber = $_POST['vnumber'];
  $seating_cap = $_POST['seating_cap'];
  $rentperday = $_POST['rentperday'];

$sql =  "UPDATE `available_cars` SET vehicleModal='$vname',
vehileNumber='$vnumber',seatingCapacity='$seating_cap',`Rent`='$rentperday' where id='$take_id'";
  $update_query = mysqli_query($conn , $sql);
  if($update_query){
    header('location:carstable.php');
  }else{
    header('location:carstable.php');
  }
  

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cars Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media.css">
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
            border-radius:15px;
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
          <a class="nav-link active" aria-current="page" href="home_agency.php">Home</a>
        </li>
</ul>
        </div>
</div>
</nav>
<h1 class="text-center p-1 text text-light fw-bold">Edit Car Details</h1>    
<div class="main_container" >

<?php
if(isset($_GET['edit'])){
    $get_id = $_GET['edit'];
    $get_data = mysqli_query($conn , "select * from `available_cars` where id=$get_id");
    $num_row = mysqli_num_rows($get_data);
    if($num_row>0){
    $row = mysqli_fetch_assoc($get_data);
 ?> 
<form method="post" class="row g-3 needs-validation" novalidate>
<input type="hidden" name="data_id" value="<?php echo $row['id'] ?>">
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Vehicle name</label>
    <input type="text" class="form-control" name="vname" required value="<?php echo $row['vehicleModal'] ?>">
  </div>
  <div class="col-md-12">
    <label for="validationCustomUsername" class="form-label">Vehicle Number</label>
      <input type="tel" class="form-control" name="vnumber" required value="<?php echo $row['vehileNumber'] ?>">
   
  </div>
  <div class="col-md-12">
    <label for="validationCustom03" class="form-label">Seating Capacity</label>
    <input type="number" class="form-control"  name="seating_cap" required value="<?php echo $row['seatingCapacity'] ?>">
 
  </div>
  <div class="col-md-12">
    <label for="validationCustom04" class="form-label">Rent Per Day in Rupess</label>
    <input type="Text" class="form-control"  name="rentperday"  required value="<?php echo $row['Rent'] ?>">
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Edit </button>
  </div>

</form>
<?php
}};
?>
</div>

</body>
</html>