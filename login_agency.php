<?php

$login = 0;
$invalid = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     include 'connect.php';

     $username = $_POST['uname'];
     $password = $_POST['password'];
     $sql = "select * from `regist_agency` where username = '$username' and pass_word = $password";
     $result = mysqli_query($conn , $sql);
     if($result){
        $num = mysqli_num_rows($result);
        if($num > 0){
            $login = 1;
            if (isset($_POST['customer_login'])) {
              $authenticated = true;
              $user_type = 'customer';
            } elseif (isset($_POST['agency_login'])) {
              $authenticated = true;
              $user_type = 'agency';
            }
            session_start();
            if ($authenticated) {
              // Store user type in session
                  $_SESSION['username'] = $username;
              $_SESSION['user_type'] = $user_type;
      
              // Redirect to appropriate dashboard or landing page
              if ($user_type == 'customer') {
                  header("Location:home.php");
                  exit();
              } elseif ($user_type == 'agency') {
                  header("Location:home_agency.php");
                  exit();
              }
        }else{
            $invalid = 1;
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
    <title>Login_agency</title>
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
<?php
if($login){
    echo '<div class="alert alert-danger" role="alert">
          youre successfully login
  </div>';
  }
    ?>
  <?php
if($invalid){
    echo '<div class="alert alert-danger" role="alert">
          Data Not Found! <strong>Please Registration Before login</strong>
  </div>';
  }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid m-3 p-3 fs-5 bg-light">
    <a class="navbar-brand" >Navbar</a>
    <div class="main_container2">
      <ul class="navbar-nav">
        <li class="nav-item">
        <?php

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
<h1 class="text-center p-3 text text-light fw-bold">Login Form For Agency members</h1>
<div class="main_container">
<form method='post' class="row g-3">
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Username</label>
    <input type="text" class="form-control" id="inputEmail4" name="uname">
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password">
  </div>
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="agency_login">Log in</button>
  </div>
</form>
</div>
<p class="text-center text text-light fs-4">Don't Have an account? <a href="registr_aggency.php">Register Here</a></p>




</body>
</html>