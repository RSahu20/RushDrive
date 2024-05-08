<?php

$success = 0;
$member = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     include 'connect.php';

     $firstname = $_POST['fname'];
     $lastname = $_POST['lname'];
     $username = $_POST['uname'];
     $email = $_POST['email'];
     $mobilenumber = $_POST['mnumber'];
     $gender = $_POST['gender'];
     $password = $_POST['password'];
     $sql = "select * from `regist_agency` where username = '$username' && pass_word = '$password'";
     $result = mysqli_query($conn , $sql);
     if($result){
        $num = mysqli_num_rows($result);
        if($num > 0){
         $member = 1;
        }else{
           $sql = "INSERT INTO `regist_agency` (firstname, lastname, username, email, mobilenumber, gender, pass_word)
            VALUES ('$firstname', '$lastname', '$username', '$email', '$mobilenumber', '$gender', '$password')";
    
           $result = mysqli_query($conn , $sql);
           if($result){
            $success = 1;
            }else{
               die(mysqli_query($conn));
            }
        }
     }
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration_agency</title>
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
  
<?php
  if($member){
    echo '<div class="alert alert-warning" role="alert">
    This Account is already exists! please Login to continue
    </div>';
  }
    ?>

<?php
  if($success){
    header('location:login_agency.php');
  }
    ?>
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid m-3 p-3 fs-5 bg-light">
    <a class="navbar-brand" >Navbar</a>
    <div class="main_container2">
      <ul class="navbar-nav">
        <li class="nav-item">  <?php

if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'customer') {

 ?>

 <a class="nav-link active" aria-current="page" href="home.php">Home</a>

 <?php

}else if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'agency'){
 ?>

 <a class="nav-link active" aria-current="page" href="home_agency.php">Home</a>

 <?php
}else{
  ?>

  <a class="nav-link active" aria-current="page" href="index.php">Home</a>

  <?php
}
?>
        </li>
</ul>
        </div>
</div>
</nav>
<h1 class="text-center p-2 text text-light fw-bold">Registration Form For Agency Members</h1>    
<div class="main_container" >

<form method="post" action="registr_aggency.php"  class="row g-3 needs-validation" novalidate>
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationCustom01" placeholder="Mark" required name="fname">
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationCustom02" placeholder="Otto" required name="lname">
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" class="form-control" name="uname" required>
      <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" required>
 
  </div>
  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">Mobile Number</label>
    <input type="tel" class="form-control" name="mnumber" required>
  </div>
  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">Gender</label>
    <select class="form-select" name="gender" required>
      <option >Choose...</option>
      <option>Female</option>
      <option>Male</option>
      <option>Others</option>
    </select>
    </div>
    <div class="col-md-12">
    <label for="validationCustom03" class="form-label">Password</label>
    <input type="text" class="form-control" name="password" placeholder="Make Password" required>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
  </div>

</form>

</div>
<p class="text-center text text-light fs-4">Have an account? <a href="login_agency.php">Login Here</a></p>
</body>
</html>